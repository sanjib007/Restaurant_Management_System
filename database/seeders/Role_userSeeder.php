<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Role_userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assign roles by email lookup
        $roles = DB::table('roles')->pluck('id','name');

        // Helper to attach role if not already attached
        $attachRole = function($email, $roleName) use ($roles) {
            $uid = DB::table('users')->where('email',$email)->value('id');
            if ($uid && isset($roles[$roleName])) {
                $exists = DB::table('role_user')->where('user_id',$uid)->where('role_id',$roles[$roleName])->exists();
                if (!$exists) {
                    DB::table('role_user')->insert([ 'user_id' => $uid, 'role_id' => $roles[$roleName] ]);
                }
            }
        };

        $attachRole('admin@gmail.com','admin');
        $attachRole('manager1@example.com','manager');
        $attachRole('manager2@example.com','manager');
        for ($i = 1; $i <= 10; $i++) {
            $attachRole("customer{$i}@example.com",'customer');
        }
    }
}
