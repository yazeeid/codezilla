<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user=User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '123456789',
        ]);

        Post::create([
            'title' => 'test',
            'description' => 'Hello World this is for test',
            'user_id' => $user->id, 
        ]);
    }
}
