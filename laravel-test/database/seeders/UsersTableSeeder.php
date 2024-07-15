<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => $faker->boolean ? now() : null,
                'password' => Hash::make('password'),
                'remember_token' => $faker->boolean ? $faker->uuid : null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
