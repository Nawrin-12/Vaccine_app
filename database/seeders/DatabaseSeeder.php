<?php

namespace Database\Seeders;

use App\Models\OpenHour;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $days = config('appointment.days');

        foreach ($days as $day) {
            OpenHour::query()->updateOrCreate([
                'day' => $day,
            ], [
                'from' => "09:00",
                'to' => '17:00',
                'step' => 30
            ]);
        }
    }
}
