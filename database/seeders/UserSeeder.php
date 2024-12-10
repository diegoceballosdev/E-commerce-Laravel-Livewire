<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Diego Ceballos',
            'email' => 'diegoceballos95@yahoo.com',
            'password' => bcrypt('42322089'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Usuario',
            'email' => 'user@gmail.com',
            'password' => bcrypt('42322089'),
        ])->assignRole('User');
        User::create([
            'name' => 'Usuario 1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('42322089'),
        ])->assignRole('User');
        User::create([
            'name' => 'Usuario 2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('42322089'),
        ])->assignRole('User');
        User::create([
            'name' => 'Usuario 3',
            'email' => 'user3@gmail.com',
            'password' => bcrypt('42322089'),
        ])->assignRole('User');
        User::create([
            'name' => 'Usuario 4',
            'email' => 'user4@gmail.com',
            'password' => bcrypt('42322089'),
        ])->assignRole('User');
        User::create([
            'name' => 'Usuario 5',
            'email' => 'user5@gmail.com',
            'password' => bcrypt('42322089'),
        ])->assignRole('User');
        User::create([
            'name' => 'Usuario 6',
            'email' => 'user6@gmail.com',
            'password' => bcrypt('42322089'),
        ])->assignRole('User');
        User::create([
            'name' => 'Usuario 7',
            'email' => 'user7@gmail.com',
            'password' => bcrypt('42322089'),
        ])->assignRole('User');
        User::create([
            'name' => 'Usuario 8',
            'email' => 'user8@gmail.com',
            'password' => bcrypt('42322089'),
        ])->assignRole('User');
    }
}
