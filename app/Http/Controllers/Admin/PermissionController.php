<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return view('backend.roles.index');
    }

    public function create()
    {
        $permission = Permission::all();
        return view('backend.roles.create',[
            'permission' => $permission
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'permission' => 'required',
        ]);

        $permission = Permission::create(['name' => $request->permission]);
        return redirect()->route('permission.create')->with('success','Hak Akses berhasil dibuat');
    }
}
