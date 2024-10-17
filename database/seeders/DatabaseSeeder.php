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

        $data = include 'data.php';

        foreach ($data as $row) {
            $row['user_id'] = 1;
            Job::create($row);
        }
    }
}
