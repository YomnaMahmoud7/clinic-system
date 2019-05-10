<?php

namespace App\Http\Controllers\Admin\Advices;
use App\Model\Advice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect,Response;
// use App\Http\Requests\AdvicesRequest;

class AdvicesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
      $advices =Advice::latest()->paginate(5);
      return view('admin.advices.index',compact('advices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('Advices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
        $advices = Advice::create($request->all());
        return response([
            'data'      => $advices,
            'message'   => 'Advices Added Successfully!'
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
    //     $advice = Advice::findOrFail($id);

    //     return view('Advices.show',compact('advice'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        
        $advice = Advice::find($id);

        if ($advice) {
            return response([
                'data' => $advice,
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
            $advice = Advice::find($id);

            if (!$advice) {
                return response([
                    'data' => '',
                    'message' => 'error'
                ]);
            }
            $advice->advice = $request->advice;

            $advice->save();

            return response([
                'data' => $advice,
                'message' => 'advice Updated Successfully!'
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
            $advice  = Advice::find($id);
            $id     = $advice->id;

            if ($advice) {
                $advice->delete();

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
            

