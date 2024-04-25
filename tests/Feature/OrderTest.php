<?php
use App\Models\User;
use App\Models\Schedule;

use Illuminate\Foundation\Testing\RefreshDatabase;
 
uses(RefreshDatabase::class);

test('schedule ordered', function () {
    $this->seed();

    $user = User::factory()->create();

    $response = $this->actingAs($user)
                     ->post('/order',['schedule_id'=>1, 'console_available_id'=>1,'controller_amount' => 1]);

    $response
    ->assertSessionHasNoErrors()
    ->assertRedirect('/dashboard');
});


