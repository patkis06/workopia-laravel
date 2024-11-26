<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookmarkUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::find(1);
        $user1->bookmarkedJobs()->attach(1);
        $user1->bookmarkedJobs()->attach(2);
        $user1->bookmarkedJobs()->attach(3);
    }
}
