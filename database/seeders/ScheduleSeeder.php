<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\ConsoleAvailable;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $times = [
            ["start" => '9:30', "end" => '10:30'],
            ["start" => '10:30', "end" => '11:30'],
            ["start" => '11:30', "end" => '12:30'],
            ["start" => '12:30', "end" => '13:30'],
            ["start" => '13:30', "end" => '14:30'],
            ["start" => '14:30', "end" => '15:30'],
            ["start" => '15:30', "end" => '16:30'],
            ["start" => '16:30', "end" => '17:30']
        ];

        $consoleIds = ConsoleAvailable::all()->pluck('id')->toArray();

        foreach ($consoleIds as $consoleId) {
            foreach ($times as $time) {
                Schedule::factory()->create([
                    'console_available_id' => $consoleId,
                    'date' => '2024-11-04',
                    'start'=> $time["start"],
                    'end'=> $time["end"]
                ]);
            }
        }
    }
}
