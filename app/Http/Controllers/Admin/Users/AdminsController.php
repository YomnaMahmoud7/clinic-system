<?php

namespace App\Http\Controllers\Admin\Users;

use App\Admin;
use App\Http\Requests\AdminRegisterRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::latest()->paginate(5);
        return view('admin.admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\AdminRegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRegisterRequest $request)
    {
        if($request->ajax()){
            
            $admins = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'type' => $request->type,
                'password' => bcrypt($request->password),
            ]);

            return response([
                'data'      => $admins,
                'message'   => 'Admin Created Successfully!'
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);

        if ($admin) {
            return response([
                'data' => $admin,
                'message' => 'success'
            ]);
        }

        return response([
            'data' => '',
            'message' => 'error'
        ]);
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
            $admin = Admin::find($id);

            if (!$admin) {
                return response([
                    'data' => '',
                    'message' => 'error'
                ]);
            }

            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->type = $request->type;

            if ($request->password != null) {
                $this->validate($request, [
                    'password' => 'required|confirmed|min:6'
                ]);
                
                $admin->password = $request->password;
            }

            $admin->save();

            return response([
                'data' => $admin,
                'message' => 'Admin Updated Successfully!'
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
            $admin  = Admin::find($id);
            $id     = $admin->id;

            if ($admin) {
                $admin->delete();

                return response([
                    'data'    => $id,
                    'message' => 'success'
                ]);
            }

            return response([
                'data'      => '',
                'message'   => 'error'
            ]);
        }
    }
}
