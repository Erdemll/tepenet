<?php

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('redirects guests to the admin login page', function () {
    $this->get(route('admin.dashboard'))
        ->assertRedirectToRoute('admin.login');
});

it('forbids authenticated users without administrator access', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('admin.dashboard'))
        ->assertForbidden();
});

it('renders the dashboard for an administrator', function () {
    $admin = User::factory()->admin()->create([
        'name' => 'Tepenet Yönetici',
    ]);

    $this->actingAs($admin)
        ->get(route('admin.dashboard'))
        ->assertOk()
        ->assertViewIs('admin.dashboard')
        ->assertSee('Genel Bakış')
        ->assertSee('Tepenet Yönetici');
});
