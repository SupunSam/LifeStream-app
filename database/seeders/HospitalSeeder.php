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
            'hsptl_name' => 'Lanka Hospital',
            'hsptl_category' => 'All Purpose',
            'hsptl_address' => 'Colombo 1',
            'hsptl_city' => 'Kadawatha',
            'hsptl_desc' => 'Lanka Hospital (formerly Apollo Hospital Sri Lanka) is multi-speciality tertiary care hospital in Sri Lanka and is one of the largest private hospitals in the country. ',
            'hsptl_web' => 'https://www.lankahospitals.com/',
            'hsptl_logo' => 'storage/hsptl/images/hsptl_1_kfc_logo.jpg',
            'hsptl_cover' => 'storage/hsptl/images/hsptl_1_kfc_cover.jpg',
        ]);
        Hospital::create([
            'user_id' => '2',
            'hsptl_name' => 'Lanka Hospital',
            'hsptl_category' => 'All Purpose',
            'hsptl_address' => 'Colombo 1',
            'hsptl_city' => 'Kadawatha',
            'hsptl_desc' => 'Lanka Hospital (formerly Apollo Hospital Sri Lanka) is multi-speciality tertiary care hospital in Sri Lanka and is one of the largest private hospitals in the country. ',
            'hsptl_web' => 'https://www.lankahospitals.com/',
            'hsptl_logo' => 'storage/hsptl/images/hsptl_1_kfc_logo.jpg',
            'hsptl_cover' => 'storage/hsptl/images/hsptl_1_kfc_cover.jpg',
        ]);
        Hospital::create([
            'user_id' => '3',
            'hsptl_name' => 'Lanka Hospital',
            'hsptl_category' => 'All Purpose',
            'hsptl_address' => 'Colombo 1',
            'hsptl_city' => 'Kadawatha',
            'hsptl_desc' => 'Lanka Hospital (formerly Apollo Hospital Sri Lanka) is multi-speciality tertiary care hospital in Sri Lanka and is one of the largest private hospitals in the country. ',
            'hsptl_web' => 'https://www.lankahospitals.com/',
            'hsptl_logo' => 'storage/hsptl/images/hsptl_1_kfc_logo.jpg',
            'hsptl_cover' => 'storage/hsptl/images/hsptl_1_kfc_cover.jpg',
        ]);
        Hospital::create([
            'user_id' => '4',
            'hsptl_name' => 'Lanka Hospital',
            'hsptl_category' => 'All Purpose',
            'hsptl_address' => 'Colombo 1',
            'hsptl_city' => 'Kadawatha',
            'hsptl_desc' => 'Lanka Hospital (formerly Apollo Hospital Sri Lanka) is multi-speciality tertiary care hospital in Sri Lanka and is one of the largest private hospitals in the country. ',
            'hsptl_web' => 'https://www.lankahospitals.com/',
            'hsptl_logo' => 'storage/hsptl/images/hsptl_1_kfc_logo.jpg',
            'hsptl_cover' => 'storage/hsptl/images/hsptl_1_kfc_cover.jpg',
        ]);
        Hospital::create([
            'user_id' => '5',
            'hsptl_name' => 'Lanka Hospital',
            'hsptl_category' => 'All Purpose',
            'hsptl_address' => 'Colombo 1',
            'hsptl_city' => 'Kadawatha',
            'hsptl_desc' => 'Lanka Hospital (formerly Apollo Hospital Sri Lanka) is multi-speciality tertiary care hospital in Sri Lanka and is one of the largest private hospitals in the country. ',
            'hsptl_web' => 'https://www.lankahospitals.com/',
            'hsptl_logo' => 'storage/hsptl/images/hsptl_1_kfc_logo.jpg',
            'hsptl_cover' => 'storage/hsptl/images/hsptl_1_kfc_cover.jpg',
        ]);
    }
}
