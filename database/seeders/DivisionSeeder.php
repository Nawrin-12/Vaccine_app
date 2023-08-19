<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $divisions = ['Dhaka', 'Chittagong', 'Sylhet', 'Khulna', 'Barishal'];
        foreach ($divisions as $division) {
            Division::create([
                'name' => $division,
            ]);
        }
    }
}
