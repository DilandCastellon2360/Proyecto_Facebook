<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Obtén todos los usuarios para asignar los posts
        $users = User::all();

        // Itera para crear 50 posts ficticios
        foreach (range(1, 10) as $index) {
            $user = $users->random();

            Post::create([
                'content' => $faker->paragraph,
                'post_date' => $faker->date,
                'user_id' => $user->id,
            ]);
        }
    }
}
