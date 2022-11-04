<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hospital::create([
            'user_id' => '1',
            'hsptl_name' => 'Asiri Hospital',
            'hsptl_category' => 'All Purpose',
            'hsptl_address' => 'Narahenpita',
            'hsptl_city' => 'Colombo',
            'hsptl_desc' => 'Asiri hospital Central Hospital prides itself in strictly adhering to international levels of patient care and safety.These high standards have resulted in Asiri Central receiving the Joint Commission international  accreditation.',
            'hsptl_web' => 'https://www.asirihospitals.lk/',
            'hsptl_logo' => 'storage/hsptl/images/hsptl_1_logo.jpg',
            'hsptl_cover' => 'storage/hsptl/images/hsptl_1_cover.jpg',
        ]);
        Hospital::create([
            'user_id' => '2',
            'hsptl_name' => 'Durdans Hospital',
            'hsptl_category' => 'All Purpose',
            'hsptl_address' => 'Wellawatta',
            'hsptl_city' => 'Colombo',
            'hsptl_desc' => 'Durdans hospital has been a trusted name in sri lankan healthcare for more than seven decades.Since our foundation in 1945, we have built reputation for regional leadership in medical excellence and motivation, based on a simple philosophy: that improving the health of our community should be driven passion as well as compassion.',
            'hsptl_web' => 'https://www.durdanshospital.lk/',
            'hsptl_logo' => 'storage/hsptl/images/hsptl_2_logo.jpg',
            'hsptl_cover' => 'storage/hsptl/images/hsptl_2_cover.jpg',
        ]);
        Hospital::create([
            'user_id' => '3',
            'hsptl_name' => 'Nevil Fernando Hospital',
            'hsptl_category' => 'All Purpose',
            'hsptl_address' => 'Malabe',
            'hsptl_city' => 'Colombo',
            'hsptl_desc' => 'Nevil fernando hospital(also refered to as Dr.Nevil fernando Sri Lanka - Russia Friendship Hospital or NFH) established in 2013, is a hi-tech multi speciality tertiary care teching hospital. it is also one of the largest private hospital in sri lanka with 210 permanent beds and capable of accommodating about 1000patients a day.',
            'hsptl_web' => 'https://www.Nevilfernandohospitals.lk/',
            'hsptl_logo' => 'storage/hsptl/images/hsptl_3_logo.jpg',
            'hsptl_cover' => 'storage/hsptl/images/hsptl_3_cover.jpg',
        ]);
        Hospital::create([
            'user_id' => '4',
            'hsptl_name' => 'Hemas Hospital',
            'hsptl_category' => 'All Purpose',
            'hsptl_address' => 'Wattala',
            'hsptl_city' => 'Colombo',
            'hsptl_desc' => 'Hemas Hospitals operates two multispecialty hospitals in Wattala, Thalawathugoda. Being the first internationally accredited hospital chain in Sri Lanka, Hemas Hospitals also operates of the largest company owned diagnostic laboratory chain in Sri Lanka with 50 laboratories spread across the country.',
            'hsptl_web' => 'https://www.hemashospitals.lk/',
            'hsptl_logo' => 'storage/hsptl/images/hsptl_4_logo.jpg',
            'hsptl_cover' => 'storage/hsptl/images/hsptl_4_cover.jpg',
        ]);
        Hospital::create([
            'user_id' => '5',
            'hsptl_name' => 'Nawaloka Hospital',
            'hsptl_category' => 'All Purpose',
            'hsptl_address' => 'Slave Island',
            'hsptl_city' => 'Colombo',
            'hsptl_desc' => 'As Sri Lanka’s first premier multi-specialty hospital, Nawaloka was set up to mirror reputed hospitals in the region which offered advanced medical technology and expert medical care, thus eliminating the need for people to travel out of Sri Lanka for specialized medical treatment.',
            'hsptl_web' => 'https://www.Nawalokahospitals.lk/',
            'hsptl_logo' => 'storage/hsptl/images/hsptl_5_logo.jpg',
            'hsptl_cover' => 'storage/hsptl/images/hsptl_5_cover.jpg',
        ]);
    }
}
