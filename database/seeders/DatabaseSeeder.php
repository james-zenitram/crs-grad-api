<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*
        \App\Models\User::create([
            'type' => 'admin',
            'name' => 'Aj',
            'email' => 'ajbgeriane2020@plm.edu.ph',
            'password' => 'devoverload'
        ]);

        \App\Models\User::create([
            'type' => 'admin',
            'name' => 'James',
            'email' => 'jammartinez2019@plm.edu.ph',
            'password' => '1a2b3c4d'
        ]);
        */
        \App\Models\UpdateBlock::create([
            'assigned_subject' => 'BSCS',
            'aysem' => '2023-2024',
            'slot' => '55'

        ]);
    }
}
