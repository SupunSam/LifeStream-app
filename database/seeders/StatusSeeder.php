<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => 'Completed',
        ]);
        Status::create([
            'name' => 'Pending',
        ]);
        Status::create([
            'name' => 'Cancelled',
        ]);
        Status::create([
            'name' => 'Rejected',
        ]);
        Status::create([
            'name' => 'Requested',
        ]);
    }
}
