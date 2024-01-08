<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CorporateUsersSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('corporate_users')->insert([
                'company_name' => "Company $i",
                'email' => "company$i@example.com",
                'password' => bcrypt('Password@123'), // You may use bcrypt() to hash passwords
                'approved' => $i % 2, // Alternating between approved and not approved
                'role' => ($i % 3) + 1, // 1, 2, or 3
                'industry' => 'Technology',
                'region' => 'North America',
                'contact_number' => '123456789',
                'fax_number' => '987654321',
                'website' => "https://company$i.com",
                'products_offered' => "Product A, Product B",
                'no_employees' => 100 + $i,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

