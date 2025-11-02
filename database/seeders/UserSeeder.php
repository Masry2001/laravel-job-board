<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '12341234',
            'role' => 'admin'
        ]);
        User::factory()->create([
            'name' => 'editor1',
            'email' => 'editor1@gmail.com',
            'password' => '12341234',
            'role' => 'editor'
        ]);
        User::factory()->create([
            'name' => 'editor2',
            'email' => 'editor2@gmail.com',
            'password' => '12341234',
            'role' => 'editor'
        ]);
        User::factory()->create([
            'name' => 'viewer',
            'email' => 'viewer@gmail.com',
            'password' => '12341234',
            'role' => 'viewer'
        ]);
    }
}
