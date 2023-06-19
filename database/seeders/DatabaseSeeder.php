<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\game;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'dzann',
            'email' => 'dzann@gmail.com',
            'password' => 'dzann123'
        ]);

        game::create([
            'title' => 'Genshin',
            'description' => 'Game Open world',
            'genre' => 'MMORPG',
            'foto' => 'photos/genshin.png'
        ]); 
        game::create([
            'title' => 'Valorant',
            'description' => 'Game tembak tembakan',
            'genre' => 'FPS',
            'foto' => 'photos/valo.png'
        ]); 
    }
}
