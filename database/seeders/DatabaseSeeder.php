<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
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

        User::factory()->create([
            'name' => 'Patrik Kiss',
            'email' => 'patrik.kiss@bluedrm.com',
        ]);

        User::factory()->create([
            'name' => 'Example Example',
            'email' => 'example@example.com',
        ]);

        $data = include 'data.php';

        foreach ($data as $key => $row) {
            if ($key < 2) {
                $row['user_id'] = 1;
            } else {
                $row['user_id'] = 2;
            }

            Job::create($row);
        }

        $user1 = User::find(1);
        $user1->bookmarkedJobs()->attach(1);
        $user1->bookmarkedJobs()->attach(2);
        $user1->bookmarkedJobs()->attach(3);
    }
}
