<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Every permission in the system, grouped by module.
     * Add a new line here to introduce a new action-permission — no code
     * changes required anywhere else.
     */
    public static function allPermissions(): array
    {
        return [
            // User management
            ['name' => 'User.View', 'description' => 'View users'],
            ['name' => 'User.Create', 'description' => 'Create users'],
            ['name' => 'User.Update', 'description' => 'Update users'],
            ['name' => 'User.Delete', 'description' => 'Delete users'],

            // Role management
            ['name' => 'Role.View', 'description' => 'View roles'],
            ['name' => 'Role.Create', 'description' => 'Create roles'],
            ['name' => 'Role.Update', 'description' => 'Update roles'],
            ['name' => 'Role.Delete', 'description' => 'Delete roles'],

            // Category
            ['name' => 'Category.View', 'description' => 'View categories'],
            ['name' => 'Category.Create', 'description' => 'Create categories'],
            ['name' => 'Category.Update', 'description' => 'Update categories'],
            ['name' => 'Category.Delete', 'description' => 'Delete categories'],

            // Item
            ['name' => 'Item.View', 'description' => 'View items'],
            ['name' => 'Item.Create', 'description' => 'Create items'],
            ['name' => 'Item.Update', 'description' => 'Update items'],
            ['name' => 'Item.Delete', 'description' => 'Delete items'],

            // Slider
            ['name' => 'Slider.View', 'description' => 'View sliders'],
            ['name' => 'Slider.Create', 'description' => 'Create sliders'],
            ['name' => 'Slider.Update', 'description' => 'Update sliders'],
            ['name' => 'Slider.Delete', 'description' => 'Delete sliders'],

            // Order — beyond CRUD, each state transition is its own permission
            ['name' => 'Order.View', 'description' => 'View orders (new / processing / completed lists & detail)'],
            ['name' => 'Order.Create', 'description' => 'Place an order'],
            ['name' => 'Order.Process', 'description' => 'Move an order to Processing'],
            ['name' => 'Order.Complete', 'description' => 'Mark an order Completed'],
            ['name' => 'Order.Paid', 'description' => 'Mark an order Paid'],
            ['name' => 'Order.Cancel', 'description' => 'Cancel an order'],

            // Order cancel requests
            ['name' => 'CancelRequest.Create', 'description' => 'Submit an order cancel request'],
            ['name' => 'CancelRequest.View', 'description' => 'View order cancel requests'],
            ['name' => 'CancelRequest.Approve', 'description' => 'Approve a cancel request'],
            ['name' => 'CancelRequest.Reject', 'description' => 'Reject a cancel request'],

            // Review
            ['name' => 'Review.View', 'description' => 'View reviews'],
            ['name' => 'Review.Create', 'description' => 'Post a review'],

            // Profile (a user managing their own account)
            ['name' => 'Profile.View', 'description' => 'View own profile'],
            ['name' => 'Profile.Update', 'description' => 'Update own profile / image'],
        ];
    }

    /**
     * Default permission set per built-in role. super_admin & admin receive
     * every permission automatically (see run()). These maps can be freely
     * changed later from the Role edit screen.
     */
    public static function rolePermissionMap(): array
    {
        return [
            'customer' => [
                'Order.View', 'Order.Create', 'Order.Cancel',
                'CancelRequest.Create',
                'Review.View', 'Review.Create',
                'Profile.View', 'Profile.Update',
            ],
            'manager' => [
                'Order.View', 'Order.Process', 'Order.Complete', 'Order.Paid', 'Order.Cancel',
                'CancelRequest.View', 'CancelRequest.Approve', 'CancelRequest.Reject',
                'Category.View',
                'Item.View', 'Item.Create', 'Item.Update',
                'Slider.View',
                'Review.View',
                'Profile.View', 'Profile.Update',
            ],
            'delivery' => [
                // Delivery staff handle home-delivery orders: see them, start the
                // delivery, mark them delivered and collect payment.
                'Order.View', 'Order.Process', 'Order.Complete', 'Order.Paid',
                'Profile.View', 'Profile.Update',
            ],
        ];
    }

    public function run()
    {
        // 1. Create every permission.
        $permissions = collect(self::allPermissions())->mapWithKeys(function ($permission) {
            $model = Permission::firstOrCreate(
                ['name' => $permission['name']],
                ['description' => $permission['description']]
            );

            return [$permission['name'] => $model->id];
        });

        // 2. super_admin & admin get ALL permissions.
        foreach (['super_admin' => 'Super Administrator', 'admin' => 'Administrator'] as $name => $description) {
            $role = Role::firstOrCreate(['name' => $name], ['description' => $description]);
            $role->permissions()->syncWithoutDetaching($permissions->values()->all());
        }

        // 3. Other built-in roles get their mapped subset.
        foreach (self::rolePermissionMap() as $roleName => $permissionNames) {
            $role = Role::firstOrCreate(['name' => $roleName], ['description' => ucfirst($roleName)]);
            $ids = $permissions->only($permissionNames)->values()->all();
            $role->permissions()->syncWithoutDetaching($ids);
        }

        // 4. Ensure a super admin user exists and is linked to the role.
        $superAdminRole = Role::where('name', 'super_admin')->first();
        $superAdminUser = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'image' => 'avatar5.png',
            ]
        );
        $superAdminUser->roles()->syncWithoutDetaching([$superAdminRole->id]);
    }
}
