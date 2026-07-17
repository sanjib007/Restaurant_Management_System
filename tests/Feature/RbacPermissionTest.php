<?php

namespace Tests\Feature;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RbacPermissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_super_admin_role_grants_all_permissions(): void
    {
        $user = User::factory()->create();
        $role = Role::create(['name' => 'super_admin', 'description' => 'Super Admin']);
        $permission = Permission::create(['name' => 'User.View', 'description' => 'View users']);

        $role->permissions()->attach($permission);
        $user->roles()->attach($role);

        $this->assertTrue($user->hasPermissionTo('User.View'));
        $this->assertTrue($user->hasPermissionTo('User.Create'));
    }

    public function test_permissions_are_combined_across_multiple_roles(): void
    {
        $user = User::factory()->create();
        $roleOne = Role::create(['name' => 'manager', 'description' => 'Manager']);
        $roleTwo = Role::create(['name' => 'sales', 'description' => 'Sales']);

        $roleOne->permissions()->attach(Permission::create(['name' => 'User.View', 'description' => 'View users']));
        $roleTwo->permissions()->attach(Permission::create(['name' => 'Product.Create', 'description' => 'Create products']));

        $user->roles()->attach([$roleOne->id, $roleTwo->id]);

        $this->assertTrue($user->hasPermissionTo('User.View'));
        $this->assertTrue($user->hasPermissionTo('Product.Create'));
    }

    public function test_updating_a_role_syncs_its_permissions(): void
    {
        $admin = User::factory()->create();
        $admin->roles()->attach(Role::create(['name' => 'super_admin', 'description' => 'Super Admin']));

        $role = Role::create(['name' => 'manager', 'description' => 'Manager']);
        $view = Permission::create(['name' => 'User.View', 'description' => 'View users']);
        $create = Permission::create(['name' => 'User.Create', 'description' => 'Create users']);
        $role->permissions()->attach($view);

        $this->actingAs($admin)->post("role_update/{$role->id}", [
            'name' => 'manager',
            'description' => 'Manager',
            'permissions' => [$create->id], // drop User.View, add User.Create
        ]);

        $role->refresh();
        $this->assertEqualsCanonicalizing(
            [$create->id],
            $role->permissions->pluck('id')->all()
        );
    }
}
