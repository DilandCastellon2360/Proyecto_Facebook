<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 10 usuarios de ejemplo
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => "User $i",
                'email' => "user$i@example.com",
                'birth_date' => now()->subYears(20)->addDays($i),
                'city' => "City $i",
                'country' => "Country $i",
                'profile_photo' => 'default-profile.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
