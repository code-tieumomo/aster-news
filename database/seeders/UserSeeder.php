<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => fake('vi_VN')->name(),
            'email' => 'admin@gmail.com',
            'email_verified_at' => now()->getTimestamp(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'role' => User::$ROLE_ADMIN,
        ]);

        for ($i = 0; $i < 100; $i++) {
            User::create([
                'name' => fake('vi_VN')->name(),
                'email' => fake()->email(),
                'email_verified_at' => now()->getTimestamp(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'role' => User::$ROLE_USER,
            ]);
        }
    }
}
