<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => Str::random(10),
            'password' => bcrypt('secret'),
            'api_token' => hash('sha256', Str::random(80)),
        ]);
    }
}
