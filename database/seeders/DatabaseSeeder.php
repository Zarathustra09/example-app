<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Joshua Pardo',
                'email'          => 'joshua.pardo30@gmail.com',
                'password'       => '$2y$12$Q4znhmyhqvhhJdDzlW9RgusmM7vESLCmGL5.E6yaM47NZk1KDOLxK',
                'remember_token' => null,
                'approved'       => 1,
                'role'           => 2,
                
            ],
        ];

        User::insert($users);
    }
}
