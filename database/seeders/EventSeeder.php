<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'hospital_id' => '1',
            'name' => 'Annual Blood Drive 1',
            'location' => 'Kandy',
            'date' => '2022-11-03',
            'attendance' => '250',
        ]);
        Event::create([
            'hospital_id' => '2',
            'name' => 'Annual Blood Drive 2',
            'location' => 'Galle',
            'date' => '2022-11-03',
            'attendance' => '150',
        ]);
        Event::create([
            'hospital_id' => '3',
            'name' => 'Annual Blood Drive 3',
            'location' => 'Matara',
            'date' => '2022-11-03',
            'attendance' => '550',
        ]);
        Event::create([
            'hospital_id' => '4',
            'name' => 'Annual Blood Drive 4',
            'location' => 'Gampaha',
            'date' => '2022-11-03',
            'attendance' => '630',
        ]);
        Event::create([
            'hospital_id' => '5',
            'name' => 'Annual Blood Drive 5',
            'location' => 'Negambo',
            'date' => '2022-11-03',
            'attendance' => '223',
        ]);
    }
}
