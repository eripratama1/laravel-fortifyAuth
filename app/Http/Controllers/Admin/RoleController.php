<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('backend.roles.index',[
            'roles' => $roles
        ])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $permission = Permission::get();
        return view('backend.roles.create',[
            'permission' => $permission
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:roles,name',
            'permission-role' => 'required'
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission-role'));

        return redirect()->route('role-permission.index');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('backend.roles.edit',compact('role','permission','rolePermissions'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
            'permission-role' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission-role'));
        return redirect()->route('role-permission.index');
    }

    public function show()
    {
        //
    }

    public function destroy($id)
    {
        $roles = Role::findOrFail($id);
        $roles->delete();
        return redirect()->route('role-permission.index');
    }
}
