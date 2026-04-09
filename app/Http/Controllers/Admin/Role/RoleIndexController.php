<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class RoleIndexController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->latest()->get();

        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('admin.role.tambah', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role = Role::create([
            'name' => $request->name
        ]);

        // sync permission (lebih aman)
        $role->permissions()->sync($request->permission_id ?? []);

        return redirect()->route('role.index')
            ->with('success', 'Role berhasil dibuat');
    }

    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::all();

        return view('admin.role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role = Role::findOrFail($id);

        $role->update([
            'name' => $request->name
        ]);

        // sync permission (hindari error null)
        $role->permissions()->sync($request->permission_id ?? []);

        return redirect()->route('role.index')
            ->with('success', 'Role berhasil diupdate');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        // optional: detach permission dulu (biar bersih)
        $role->permissions()->detach();

        $role->delete();

        return redirect()->route('role.index')
            ->with('success', 'Role berhasil dihapus');
    }
}