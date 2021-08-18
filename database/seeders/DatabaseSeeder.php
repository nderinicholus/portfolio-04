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
        // $services =  \App\Models\Service::factory(3)->create();
        // $tags = \App\Models\Tag::factory(10)->create();
        \App\Models\Portfolio::factory(rand(1, 20))->create();
        
    }
}

