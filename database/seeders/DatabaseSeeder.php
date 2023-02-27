<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


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

        \App\Models\User::factory()->create([
            'name' => 'Mai',
            'email' => 'mai08061286@gmail.com',
            "password" => Hash::make("maiW0806")
        ]);
        \App\Models\User::factory()->create([
            'name' => 'test1',
            'email' => 'test1@gmail.com',
            "password" => Hash::make("testtest")
        ]);
        \App\Models\User::factory()->create([
            'name' => 'test2',
            'email' => 'test2@gmail.com',
            "password" => Hash::make("testtest")
        ]);
        \App\Models\User::factory()->create([
            'name' => 'test3',
            'email' => 'test3@gmail.com',
            "password" => Hash::make("testtest")
        ]);
        \App\Models\User::factory()->create([
            'name' => 'test4',
            'email' => 'test4@gmail.com',
            "password" => Hash::make("testtest")
        ]);
        \App\Models\User::factory()->create([
            'name' => 'test5',
            'email' => 'test5@gmail.com',
            "password" => Hash::make("testtest")
        ]);
    }
}







