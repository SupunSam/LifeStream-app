<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRequest;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRequest::create([
            'user_id' => '4',
            'email' => 'visiter1@laravel.com',
            'request_type' => 'Donor',
            'description' => 'I want to donate blood.',
        ]);
        UserRequest::create([
            'user_id' => '4',
            'email' => 'visiter2@laravel.com',
            'request_type' => 'Donor',
            'description' => 'I want to donate blood.',
        ]);
        UserRequest::create([
            'user_id' => '4',
            'email' => 'visiter3@laravel.com',
            'request_type' => 'Donor',
            'description' => 'I want to donate blood.',
        ]);
        UserRequest::create([
            'user_id' => '4',
            'email' => 'visiter4@laravel.com',
            'request_type' => 'Donor',
            'description' => 'I want to donate blood.',
        ]);
    }
}
