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
        \App\Models\User::create([
            'type' => 'admin',
            'name' => 'Aj',
            'email' => 'ajbgeriane2020@plm.edu.ph',
            'password' => 'devoverload'
        ]);
    }
}
