<?php


namespace App\Http\Controllers\Admin\Patients;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\Patient;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient =Patient::all();
        return view('front.patients.index' , ['patientData'=>$patient]);
        //
      //  print_r($patient[1]->created_at);
       // $patient =Patient::latest()->paginate(5);

        
        
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $patient=Patient::find($id);
        

        // return view('books/show',[
        //   'book_instance'=>$book_instance
        // ]);
        
        return view('front.patients.show-edit' , ['patientData'=>$patient]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $patient=Patient::find($id);
        

        // return view('books/show',[
        //   'book_instance'=>$book_instance
        // ]);
        
        return view('front.patients.show-edit' , ['patientData'=>$patient]);


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
        //
        //dd($request);
        $patient=Patient::find($id);
        //$patient->name=$request->name;    
        $patient->name=request('name');
        $patient->age=request('age');        
        $patient->job=request('job');
        $patient->mobile=request('mobile');
        //$value_to_insert = Input::get('gender') == 'true' ? 1 : 0;

        if(Input::get('gender') == 'true'){
            $patient->gender=request('gender');
        }
        
        if(Input::get('material_status') == 'true'){
            $patient->material_status=request('material_status');
        }

        $patient->save();

        return redirect("patients");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Patient::find($id)->delete();


        return redirect("patients");
    }
}
