<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            // Check if the admin user already exists
        if (!DB::table('users')->where('email', 'admin@example.com')->exists()) {
            // Create admin user
            DB::table('users')->insert([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('Test@123'), // Use Hash::make to hash passwords
                'approved' => 1,
                'role' => 1,
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // Generate 14 random users
        \App\Models\User::factory(14)->create(); // Adjust the namespace and model name as needed
    }
}
