<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.roles.index', [
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('admin.roles.create', ['permissions' => $permissions]);
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
                'name'=>'required|unique:roles|max:20',
                'permissions' =>'required',
            ]);

            $name = $request['name'];
            $role = new Role();
            $role->name = $name;

            $permissions = $request['permissions'];

            $role->save();
            //Looping thru selected permissions
            foreach ($permissions as $permission) {
                $p = Permission::where('id', '=', $permission)->firstOrFail(); 
                //Fetch the newly created role and assign permission
                $role = Role::where('name', '=', $name)->first(); 
                $role->givePermissionTo($p);
            }

            return response([
                'data' => [
                    'role' => $role,
                    'permissions' => str_replace(array('[',']','"'),' ', $role->permissions()->pluck('name'))
                ],
                'message' => 'success'
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
        return redirect()->route('roles.index');
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
            $role = Role::findOrFail($id);
            $permissions = Permission::all();

            if ($role) {
                return response([
                    'data' => [
                        'role' => $role,
                        'permissions' => $role->permissions->pluck('id')
                    ],
                    'message' => 'success'
                ]);
            }

            return response([
                'data' => '',
                'message' => 'error'
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
            $role = Role::findOrFail($id);//Get role with the given id
            //Validate name and permission fields
            $this->validate($request, [
                'name'=>'required|max:20|unique:roles,name,'.$id,
                'permissions' =>'required',
            ]);

            $input = $request->except(['permissions']);
            $permissions = $request['permissions'];
            $role->fill($input)->save();

            $p_all = Permission::all();//Get all permissions

            foreach ($p_all as $p) {
                $role->revokePermissionTo($p); //Remove all permissions associated with role
            }

            foreach ($permissions as $permission) {
                $p = Permission::where('id', $permission)->firstOrFail(); //Get corresponding form //permission in db
                $role->givePermissionTo($p->name);  //Assign permission to role
            }

            
            return response([
                'data' => [
                    'role' => $role,
                    'permissions' => str_replace(array('[',']','"'),' ', $role->permissions()->pluck('name'))
                ],
                'message' => 'Role Updated Successfully!'
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
            $role = Role::findOrFail($id);
            $id = $role->id;
            $role->delete();

            return response([
                'data' => $id,
                'message' => 'success'
            ]);
        }
    }
}
