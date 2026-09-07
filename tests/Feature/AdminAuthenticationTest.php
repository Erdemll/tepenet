<?php

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\RateLimiter;

uses(LazilyRefreshDatabase::class);

it('renders the admin login page', function () {
    $this->get(route('admin.login'))
        ->assertOk()
        ->assertViewIs('admin.auth.login')
        ->assertSee('Yönetici girişi');
});

it('authenticates an administrator with valid credentials', function () {
    $admin = User::factory()->admin()->create([
        'username' => 'tepenet',
        'password' => 'correct-password',
    ]);

    $response = $this->post(route('admin.login.store'), [
        'username' => '  TEPENET ',
        'password' => 'correct-password',
    ]);

    $response->assertRedirectToRoute('admin.dashboard');
    $this->assertAuthenticatedAs($admin);
});

it('rejects invalid administrator credentials without revealing which field failed', function () {
    User::factory()->admin()->create([
        'username' => 'tepenet',
        'password' => 'correct-password',
    ]);

    $response = $this->from(route('admin.login'))->post(route('admin.login.store'), [
        'username' => 'tepenet',
        'password' => 'incorrect-password',
    ]);

    $response
        ->assertRedirectToRoute('admin.login')
        ->assertSessionHasErrors([
            'username' => 'Kullanıcı adı veya parola hatalı.',
        ]);
    $this->assertGuest();
});

it('rejects a non administrator even when the credentials are valid', function () {
    User::factory()->create([
        'username' => 'editor',
        'password' => 'correct-password',
    ]);

    $response = $this->from(route('admin.login'))->post(route('admin.login.store'), [
        'username' => 'editor',
        'password' => 'correct-password',
    ]);

    $response
        ->assertRedirectToRoute('admin.login')
        ->assertSessionHasErrors([
            'username' => 'Kullanıcı adı veya parola hatalı.',
        ]);
    $this->assertGuest();
});

it('requires both login fields', function () {
    $response = $this->from(route('admin.login'))->post(route('admin.login.store'));

    $response
        ->assertRedirectToRoute('admin.login')
        ->assertSessionHasErrors([
            'username' => 'Kullanıcı adınızı girin.',
            'password' => 'Parolanızı girin.',
        ]);
});

it('rate limits repeated failed login attempts', function () {
    RateLimiter::clear('tepenet|127.0.0.1');

    foreach (range(1, 5) as $attempt) {
        $this->post(route('admin.login.store'), [
            'username' => 'tepenet',
            'password' => 'incorrect-password',
        ]);
    }

    $response = $this->post(route('admin.login.store'), [
        'username' => 'tepenet',
        'password' => 'incorrect-password',
    ]);

    $response->assertSessionHasErrors('username');
    expect(session('errors')->first('username'))
        ->toStartWith('Çok fazla giriş denemesi yapıldı.');
});

it('logs an authenticated administrator out and invalidates the session', function () {
    $admin = User::factory()->admin()->create();

    $response = $this->actingAs($admin)->post(route('admin.logout'));

    $response->assertRedirectToRoute('admin.login');
    $this->assertGuest();
});
