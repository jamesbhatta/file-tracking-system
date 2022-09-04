<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now()
        ]);

        \App\Models\User::create([
            'name' => 'Test Employee',
            'email' => 'emp@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now()
        ]);


        collect([
            'A1',
            'A2',
            'A3',
            'A4',
            'B1',
            'B2',
            'B3',
            'B4',
        ])->each(function ($number) {
            \App\Models\Rack::create([
                'number' => $number,
            ]);
        });
    }
}
