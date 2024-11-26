<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = include 'data.php';

        foreach ($data as $key => $row) {
            if ($key < 2) {
                $row['user_id'] = 1;
            } else {
                $row['user_id'] = 2;
            }

            Job::create($row);
        }
    }
}
