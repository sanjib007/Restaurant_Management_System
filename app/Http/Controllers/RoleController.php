<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function store_role(Request $request)
    {
        $validated = $request->validate(
        [
            'name' => 'required|max:150',
            'description' => 'required|max:550',
            'permissions' => 'sometimes|array',
            'permissions.*' => 'integer|exists:permissions,id',
        ]);

        $role = Role::create(
        [
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        // Assign the selected permissions to the new role (many-to-many).
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('user')->with('msg', 'Role added successfully!');

    }


    public function edit_role($id)
    {
        $role = Role::with('permissions')->findOrFail($id);

        // All permissions grouped by module (prefix before the dot) so the
        // view can render View/Create/Update/Delete checkboxes per module.
        $permissions = Permission::orderBy('name')->get()->groupBy(function ($permission) {
            return explode('.', $permission->name)[0];
        });

        // IDs currently granted to this role, for pre-checking the boxes.
        $assignedPermissionIds = $role->permissions->pluck('id')->all();

        return view('pages.secure.role.role_edit', [
            'role' => $role,
            'permissions' => $permissions,
            'assignedPermissionIds' => $assignedPermissionIds,
        ]);
    }



    public function update_role(Request $request, $id)
    {
        $validated = $request->validate(
        [
            'name' => 'required|max:150',
            'description' => 'required|max:550',
            'permissions' => 'sometimes|array',
            'permissions.*' => 'integer|exists:permissions,id',
        ]);

        $role = Role::findOrFail($id);

        $role->update(
        [
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        // Replace the role's permission set with the submitted selection.
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('user')->with('msg', 'Role Updated successfully!');

    }



    public function delete_role($id)
    {
        $role = Role::findOrFail($id);
        if($role == null){
            return redirect()->back()->with('msg', 'role is not found');
        }

        $role->delete();
        return redirect('user')->with('msg', 'Profile Deleted successfully!'); 
    }
}