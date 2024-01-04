<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
                'email' => 'joshua.pardo30@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('Test@123'), // Use Hash::make to hash passwords
                'approved' => 1,
                'role' => 2,
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'gender' => 'male', // Add the gender field with a default value
            ]);
        }

        // Generate 19 random users with a gender field
        \App\Models\User::factory(19)->create(['gender' => $this->getRandomGender()]);
    }

    /**
     * Get a random gender for the user.
     *
     * @return string
     */
    private function getRandomGender(): string
    {
        $genders = ['male', 'female', 'other'];
        return $genders[array_rand($genders)];
    }
}
