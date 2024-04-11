<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Console;

class ConsoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $consoles = array('Playstation 5', 'Xbox One', 'PC');

        foreach ($consoles as $console) {
            $consoleMod = new Console;
            $consoleMod->name = $console;
            $consoleMod->save();
        }     
    }
}
