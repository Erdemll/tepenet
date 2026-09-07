<?php

use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(LazilyRefreshDatabase::class);

it('creates the configured administrator with a hashed password', function () {
    config()->set('admin', [
        'name' => 'Tepenet Yönetici',
        'username' => 'Tepenet',
        'email' => 'admin@tepenet.local',
        'password' => 'StrongPassword123.',
    ]);

    $this->seed(AdminUserSeeder::class);

    $admin = User::query()->where('username', 'tepenet')->firstOrFail();

    expect($admin->is_admin)->toBeTrue()
        ->and($admin->password)->not->toBe('StrongPassword123.')
        ->and(Hash::check('StrongPassword123.', $admin->password))->toBeTrue();
});

it('updates the configured administrator without creating a duplicate', function () {
    config()->set('admin', [
        'name' => 'Tepenet Yönetici',
        'username' => 'tepenet',
        'email' => 'admin@tepenet.local',
        'password' => 'StrongPassword123.',
    ]);

    $this->seed(AdminUserSeeder::class);
    config()->set('admin.name', 'Yeni Yönetici Adı');
    $this->seed(AdminUserSeeder::class);

    expect(User::query()->where('username', 'tepenet')->count())->toBe(1)
        ->and(User::query()->where('username', 'tepenet')->value('name'))->toBe('Yeni Yönetici Adı');
});
