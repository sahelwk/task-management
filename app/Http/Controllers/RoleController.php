<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

 function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store', 'show']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {   
        $permissions = Permission::all();
        $search = $request->input('search');

        $roles = Role::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%$search%");
              
       })->paginate(10);
       return view("roles.index", ['roles' => $roles ,'permissions'=>$permissions]);
    }

    
   
public function create()
{
    $permissions = Permission::all();
    return view('roles.create', ['permissions' => $permissions]);
}
//

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:roles',
            'permission'=> 'required',
        ]);


$role = Role::create(['name' => $request->input('name')]);
$role->syncPermissions($request->input('permission'));
$role = redirect()->route('roles.index');


// $role = Role::create(['name' => $request->input('name')]);
//     $role->syncPermissions($request->input('permission'));

//     return redirect()->route('roles.index');

     if($role){
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');

     }
     else{
        return back()->with('error','something went wrong');
     }


    }


    public function edit(Role  $role)
    {

        if (!is_null($role)) {
            $rolepermissions = $role->permissions->pluck('id')->toArray();
        }
        $permissions = Permission::all();
        return view("roles.edit", ['permissions' => $permissions, 'role' => $role, 'rolepermissions' => $rolepermissions]);
    }
//
public function update(Request $request, Role  $role)
{

     $request->validate([
        'name' => 'required',
        'permission' => 'required',
    ]);
    $role->name = $request->input('name');
    $role->syncPermissions($request->input('permission'));
    $role->save();
    return redirect()->route('roles.index')->with('success', 'messages.role_update');
}

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
