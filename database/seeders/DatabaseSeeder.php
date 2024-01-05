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
                'industry' => 'IT', // Add the industry field with a default value
                'nationality' => $this->getRandomNationality(), // Add the nationality field with a default value
            ]);
        }

        // Generate 19 random users with gender, industry, and nationality fields
        for ($i = 0; $i < 19; $i++) {
            \App\Models\User::factory()->create([
                'gender' => $this->getRandomGender(),
                'industry' => $this->getRandomIndustry(),
                'nationality' => $this->getRandomNationality(),
            ]);
        }
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

    /**
     * Get a random industry for the user.
     *
     * @return string
     */
    private function getRandomIndustry(): string
    {
        $industries = ['IT', 'Finance', 'Healthcare', 'Education', 'Manufacturing', 'Other'];
        return $industries[array_rand($industries)];
    }

    /**
     * Get a random nationality for the user.
     *
     * @return string
     */
    private function getRandomNationality(): string
    {
        $nationalities = array_keys(config('countries'));
        return $nationalities[array_rand($nationalities)];
    }
}
