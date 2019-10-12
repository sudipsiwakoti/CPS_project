<?php

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
        // Containts a list of database seeders to be called when the command
        // $ php artisan migrate:fresh -seed 
        // is called
        $this->call([
        	SubjectsTableSeeder::class,
        	CoursesTableSeeder::class
        ]);
    }
}
