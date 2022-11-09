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
        // #1
        Status::create([
            'name' => 'Completed',
        ]);
        // #2
        Status::create([
            'name' => 'Pending',
        ]);
        // #3
        Status::create([
            'name' => 'Cancelled',
        ]);
        // #4
        Status::create([
            'name' => 'Rejected',
        ]);
        // #5
        Status::create([
            'name' => 'Requested',
        ]);
        // #6
        Status::create([
            'name' => 'Approved',
        ]);
    }
}
