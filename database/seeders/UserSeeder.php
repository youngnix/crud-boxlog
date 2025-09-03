<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => env('APP_ADMIN_USERNAME'),
            'email' => env('APP_ADMIN_USERNAME').'@localhost',
            'password' => env('APP_ADMIN_PASSWORD'),
            'role' => 'logistics_manager',
        ]);
    }
}
