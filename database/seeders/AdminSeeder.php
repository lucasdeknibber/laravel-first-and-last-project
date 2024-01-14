<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('Password!321'),
            'birthday' => '1999-01-01',
            'bio' => 'I am an admin user!',
            'avatar' => '',
            'is_admin' => true,
        ]);
        $regularUser = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('Secret123'),
            'birthday' => '2000-05-15',
            'bio' => 'I am a regular user!',
            'avatar' => '',
            'is_admin' => false,
        ]);
    }
}
