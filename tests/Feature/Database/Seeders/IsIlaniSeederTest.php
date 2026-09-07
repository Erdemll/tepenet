<?php

use App\Models\IsIlani;
use Database\Seeders\IsIlaniSeeder;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('imports the current jobs idempotently', function () {
    $this->seed(IsIlaniSeeder::class);
    $this->seed(IsIlaniSeeder::class);

    expect(IsIlani::query()->count())->toBe(12)
        ->and(IsIlani::query()->where('type', IsIlani::TYPE_SECURITY_OFFICER)->count())->toBe(11)
        ->and(IsIlani::query()->where('type', IsIlani::TYPE_SECURITY_MANAGER)->count())->toBe(1);
});
