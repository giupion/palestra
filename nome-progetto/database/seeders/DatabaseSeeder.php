<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CourseSeeder::class); // Chiama il seeder dei corsi
        $this->call(ActivitySeeder::class); // Chiama il seeder delle attività
    }
}
