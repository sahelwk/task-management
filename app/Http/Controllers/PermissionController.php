<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index', 'store', 'show']]);
        $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }



    public function index(Request $request)
    {
        $search = $request->input('search');

        $permissions = Permission::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%$search%");
              
       })->paginate(10);

       
        return view("permissions.index",compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|unique:permissions,name',
        ]);

     $permission = Permission::create(['name' => $request->input('name'),]);
    if($permission){
        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }
    else{
        return redirect()->route('permissions.index')->with('error', 'Something went wrong.');
    }
    }

    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|min:3|unique:permissions,name,' . $permission->id,
        ]);
  if($permission->fill($request->psot())->save()){

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }
    else{
        return redirect()->route('permissions.index')->with('error', 'something went wrong.');
    }
    }
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
