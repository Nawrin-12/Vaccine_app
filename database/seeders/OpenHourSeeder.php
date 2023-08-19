<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OpenHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
