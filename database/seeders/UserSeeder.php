<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('password'), 'image' => 'avatar5.png'],
            ['name' => 'manager1', 'email' => 'manager1@example.com', 'password' => Hash::make('password'), 'image' => 'manager1.png'],
            ['name' => 'manager2', 'email' => 'manager2@example.com', 'password' => Hash::make('password'), 'image' => 'manager2.png'],
        ];

        // Customers
        for ($i = 1; $i <= 10; $i++) {
            $users[] = ['name' => "customer{$i}", 'email' => "customer{$i}@example.com", 'password' => Hash::make('password'), 'image' => "customer{$i}.png"];
        }

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => $user['password'],
                    'image' => $user['image'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}
