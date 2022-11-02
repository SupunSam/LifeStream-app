<?php

namespace Database\Seeders;

use App\Models\BloodType;
use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BloodType::create([
            'bloodtype_code' => 'A+',
            'bloodtype_name' => 'A Positive',
            'bloodtype_gives' => 'A+,AB+',
            'bloodtype_gets' => 'A+,A-,O+,O-',
        ]);
        BloodType::create([
            'bloodtype_code' => 'O+',
            'bloodtype_name' => 'O Positive',
            'bloodtype_gives' => 'O+,A+,B+,AB+',
            'bloodtype_gets' => 'O+,O-',
        ]);
        BloodType::create([
            'bloodtype_code' => 'B+',
            'bloodtype_name' => 'B Positive',
            'bloodtype_gives' => 'B+,AB+',
            'bloodtype_gets' => 'B+,B-,O+,O-',
        ]);
        BloodType::create([
            'bloodtype_code' => 'AB+',
            'bloodtype_name' => 'AB Positive',
            'bloodtype_gives' => 'AB+',
            'bloodtype_gets' => 'All',
        ]);
        BloodType::create([
            'bloodtype_code' => 'A-',
            'bloodtype_name' => 'A Negative',
            'bloodtype_gives' => 'A+,A-,AB+,AB-',
            'bloodtype_gets' => 'A-,O-',
        ]);
        BloodType::create([
            'bloodtype_code' => 'O-',
            'bloodtype_name' => 'O Negative',
            'bloodtype_gives' => 'All',
            'bloodtype_gets' => 'O-',
        ]);
        BloodType::create([
            'bloodtype_code' => 'B-',
            'bloodtype_name' => 'B Negative',
            'bloodtype_gives' => 'B+,B-,AB+,AB-',
            'bloodtype_gets' => 'B-,O-',
        ]);
        BloodType::create([
            'bloodtype_code' => 'AB-',
            'bloodtype_name' => 'AB Negative',
            'bloodtype_gives' => 'AB+,AB-',
            'bloodtype_gets' => 'AB-,A-,B-,O-',
        ]);
    }
}
