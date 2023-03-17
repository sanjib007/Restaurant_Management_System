<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function store_role(Request $request)
    {
        $validate = $request->validate(
        [
            'name' => 'required|max:150',
            'description' => 'required|max:550'
        ]);

        Role::create(
        [
            'name' => $request->name,
            'description' => $request->description         
        ]);

        return redirect()->route('user')->with('msg', 'Role added successfully!');

    }


    public function edit_role($id)
    {
        $role = Role::findOrFail($id);
        return view('pages.secure.role.role_edit', ["role" => $role ]);
    }



    public function update_role(Request $request, $id)
    {

        $validate = $request->validate(
        [
            'name' => 'required|max:150',
            'description' => 'required|max:550'   
        ]);
    

        Role::where('id', $id)->update(
        [
            'name' => $request->name,
            'description' => $request->description             
        ]);

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