<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('super_admin-action');
        
        $roles = Role::all();
        return view("Admin.Roles.role-list", compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('super_admin-action');
        return view("Admin.Roles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('super_admin-action');

        $validated = $request->validate([
            'role' => 'required|unique:Role',
            'description' => 'required',
        ]);

        $requestedValue = ['role', 'description'];
        if ($request->has($requestedValue)) {
            Role::create($request->except('_token'));
            return redirect(route('roles.index'))->with('success', 'Role Created Successfully');
        }
        return redirect(route('roles.index'))->with('failure', 'Failed to Create Role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('super_admin-action');
        return view("Admin.Roles.role-edit", compact(['role']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        Gate::authorize('super_admin-action');

        $validated = $request->validate([
            'role' => 'required',
            'description' => 'required',
        ]);
        $requestedValue = ['role', 'description'];
        if ($request->has($requestedValue)) {
            $role->update($request->except('_token', '_method'));
            return redirect(route('roles.index'))->with('success', 'Role Updated Successfully');
        }
        return redirect(route('roles.index'))->with('failure', 'Failed to Update Role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('super_admin-action');
        
        if ($id != null) {
            Role::where('id', ['id' => $id])->delete();
            return redirect(route('roles.index'))->with('success', 'Successfully Deleted');
        }
        return redirect(route('roles.index'))->with('failure', 'Failed to Delete');
    }
}
