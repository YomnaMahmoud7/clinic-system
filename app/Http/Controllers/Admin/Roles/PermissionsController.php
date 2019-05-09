<?php

namespace App\Http\Controllers\Admin\Roles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        $roles = Role::all();

        return view('admin.permissions.index', [
            'permissions' => $permissions,
            'roles'         => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.permissions.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                'name'=>'required|unique:permissions|max:40',
            ]);

            $name = $request['name'];
            $permission = new Permission();
            $permission->name = $name;
            $permission->guard_name = $request->guard_name;

            $roles = $request['roles'];

            $permission->save();

            if (!empty($request['roles'])) { //If one or more role is selected
                foreach ($roles as $role) {
                    $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

                    $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                    $r->givePermissionTo($permission);
                }
            }

            return response([
                'data' => $permission,
                'message' => 'Permission Added Successfully!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('permissions.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $permission = Permission::find($id);

            return response([
                'data' => $permission,
                'message' => 'success'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $permission = Permission::findOrFail($id);
            $this->validate($request, [
                'name'=>'required|max:40',
            ]);
            $input = $request->all();
            $permission->fill($input)->save();

            return response([
                'data' => $permission,
                'message' => 'Permission Updated Successfully!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (request()->ajax()) {
            $permission = Permission::find($id);
            $id = $permission->id;

            //Make it impossible to delete this specific permission    
            if ($permission->name == "Super Admin") {
                return response([
                    'data' => '',
                    'message' => 'Can not delete this permission'
                ]);
            }

            $permission->delete();

            return response([
                'data' => $id,
                'message' => 'success'
            ]);
        }
    }
}
