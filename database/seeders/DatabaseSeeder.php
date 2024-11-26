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
        // User::factory(10)->create();

        // Job::factory(50)->create();

        $this->call(UserSeeder::class);
        $this->call(JobSeeder::class);
        $this->call(BookmarkUserSeeder::class);
        $this->call(ApplicantSeeder::class);
    }
}
