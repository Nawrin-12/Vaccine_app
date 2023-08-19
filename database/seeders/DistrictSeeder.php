<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dhaka = ['Dhaka', 'Gazipur', 'Demra', 'Narayngong'];
        $Chittagong = ['Chittagong', 'Cumilla', 'Rangamati', 'Bandarban'];
        $Sylhet = ['Habiganj', 'Moulvibazar', 'Sunamganj', 'Sylhet'];
        $Khulna = ['Kushtia', 'Jessore', 'Magura', 'Jhenaidah'];
        $Barishal = ['Barishal', 'Barguna', 'Jhalokati', 'Pirojpur'];

        foreach ($dhaka as $dhk) {
            District::create([
                'division_id' => 1,
                'name' => $dhk,
            ]);
        }

        foreach ($Chittagong as $dhk) {
            District::create([
                'division_id' => 2,
                'name' => $dhk,
            ]);
        }


        foreach ($Sylhet as $dhk) {
            District::create([
                'division_id' => 3,
                'name' => $dhk,
            ]);
        }


        foreach ($Khulna as $dhk) {
            District::create([
                'division_id' => 4,
                'name' => $dhk,
            ]);
        }

        foreach ($Barishal as $dhk) {
            District::create([
                'division_id' => 5,
                'name' => $dhk,
            ]);
        }
    }
}
