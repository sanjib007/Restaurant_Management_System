<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'super_admin', 'description' => 'Super Administrator'],
            ['name' => 'admin', 'description' => 'Administrator'],
            ['name' => 'manager', 'description' => 'Manager'],
            ['name' => 'delivery', 'description' => 'Delivery Staff'],
            ['name' => 'customer', 'description' => 'Customer'],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(
                ['name' => $role['name']],
                ['description' => $role['description'], 'updated_at' => now(), 'created_at' => now()]
            );
        }
    }
}
