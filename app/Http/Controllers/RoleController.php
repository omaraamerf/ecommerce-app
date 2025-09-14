<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Http\Middleware;
class RoleController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $roles = Role::with('permissions')->get();
        $perms = Permission::all();
        return view('roles.index', compact('roles','perms'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|unique:roles,name']);
        Role::create($data);
        return back()->with('ok','role-created');
    }

    public function attachPermission(Request $request, Role $role)
    {
        $data = $request->validate(['permission' => 'required|string|exists:permissions,name']);
        $role->givePermissionTo($data['permission']);
        return back()->with('ok','perm-attached');
    }

    public function detachPermission(Request $request, Role $role)
    {
        $data = $request->validate(['permission' => 'required|string|exists:permissions,name']);
        $role->revokePermissionTo($data['permission']);
        return back()->with('ok','perm-detached');
    }
}
