<?php

namespace App\Http\Controllers\Admin\Drugs;
use App\Model\Drug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect,Response;
// use App\Http\Requests\drugsRequest;

class DrugsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
      $drugs =Drug::latest()->paginate(5);
      return view('admin.drugs.index',compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         if($request->ajax()){
         $drugs = Drug::create($request->all());
         return response([
             'data'      => $drugs,
             'message'   => 'drugs Added Successfully!'
         ]);
             
     }
     }
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     // public function show($id)
     // {
     //     //
     //     $drug = Drug::findOrFail($id);
 
     //     return view('Drugs.show',compact('drug'));
     // }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit( $id)
     {
         
         $drug = Drug::find($id);
 
         if ($drug) {
             return response([
                 'data' => $drug,
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
     public function update(Request $request,$id)
     {
     
         if ($request->ajax()) {
             $drug = Drug::find($id);
 
             if (!$drug) {
                 return response([
                     'data' => '',
                     'message' => 'error'
                 ]);
             }
             $drug->name = $request->name;
             $drug->description = $request->description;
 
             $drug->save();
 
             return response([
                 'data' => $drug,
                 'message' => 'drug Updated Successfully!'
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
             $drug  = Drug::find($id);
             $id     = $drug->id;
 
             if ($drug) {
                 $drug->delete();
 
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
             
 
 