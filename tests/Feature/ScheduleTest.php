<?php
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
 
uses(RefreshDatabase::class);


test('schedule page is displayed', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
                     ->get('/schedule');

    $response->assertStatus(200)->assertViewIs('schedule.list');
});


test('dashboard page is displayed', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
                     ->get('/dashboard');

    $response->assertStatus(200)->assertViewIs('dashboard');
});


