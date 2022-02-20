<?php

namespace Database\Seeders;

use App\Models\System;
use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        System::updateOrCreate(
            ['id' => 1],
            [
                'key' => 'examiantion',
                'value' => 200
            ]
        );
    }
}
