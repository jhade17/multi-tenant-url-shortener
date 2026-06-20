<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        DB::table('users')->insert([

            'name' => 'Super Admin',

            'email' => 'superadmin@gmail.com',

            'password' => Hash::make('12345678'),

            'role' => UserRole::SUPER_ADMIN->value,

            'created_at' => now(),

            'updated_at' => now(),

        ]);

    }
}
