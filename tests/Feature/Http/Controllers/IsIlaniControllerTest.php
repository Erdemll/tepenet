<?php

use App\Models\IsIlani;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('renders only active jobs from the database', function () {
    $activeJob = IsIlani::factory()->create([
        'title' => 'Yayındaki İş İlanı',
        'is_active' => true,
    ]);
    $inactiveJob = IsIlani::factory()->inactive()->create([
        'title' => 'Taslak İş İlanı',
    ]);
    $deletedJob = IsIlani::factory()->create([
        'title' => 'Silinmiş İş İlanı',
    ]);
    $deletedJob->delete();

    $response = $this->get(route('is-ilanlari'));

    $response
        ->assertOk()
        ->assertViewIs('is_ilanlari')
        ->assertSee($activeJob->title)
        ->assertDontSee($inactiveJob->title)
        ->assertDontSee($deletedJob->title);
});

it('escapes job content rendered on the public page', function () {
    $dangerousTitle = '<script>alert("ilan")</script> Güvenlik Görevlisi';
    IsIlani::factory()->create([
        'title' => $dangerousTitle,
        'summary' => '<img src=x onerror=alert(1)>',
        'cities' => ['<script>Konya</script>'],
    ]);

    $response = $this->get(route('is-ilanlari'));

    $response
        ->assertOk()
        ->assertSee($dangerousTitle)
        ->assertDontSee($dangerousTitle, false)
        ->assertDontSee('<img src=x onerror=alert(1)>', false)
        ->assertDontSee('<script>Konya</script>', false);
});

it('renders an accessible mobile filter dialog contract', function () {
    IsIlani::factory()->create();

    $response = $this->get(route('is-ilanlari'));

    $response
        ->assertSee('id="jobsFilter" role="region"', false)
        ->assertSee('id="jobsFilterBackdrop"', false)
        ->assertSee('jobs-filter-open', false)
        ->assertSee("isMobile ? 'dialog' : 'region'", false)
        ->assertSee("event.key === 'Escape'", false);
});
