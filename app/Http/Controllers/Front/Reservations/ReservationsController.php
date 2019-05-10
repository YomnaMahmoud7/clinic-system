<?php

namespace App\Http\Controllers\Front\Reservations;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Model\Reservation;
use App\Model\Patient;
//use Validator;
use Illuminate\Support\Facades\Input;
use Response;

//use Illuminate\Validation\Validator;
//use Illuminate\Support\Facades\Validator;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Contracts\Validation\Factory;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $reservation=Reservation::all();

      //  print_r($reservation[1]->created_at);
       // $reservation =Reservation::latest()->paginate(5);

        return view('front.reservations.index', ['reservationData'=>$reservation]);
        
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

        //var_dump(Request);
        
    }

    public function addReservation(Request $request){
      //   request()->validate([
      //       'title'=>'required',
      //       'description'=>['required']
      // ]);

        // $rules=[
        //     'patient_id'=>'requierd'
        // ];

       // $validator= Validator::make(Input::all(),$rules);
        
        // if($validator->fails()){
        //     return response::json([
        //         'errors'=>$validator->getMessageBag()->toarray()
        //     ]);
            
        // }
       // else{
            $reservation=new Reservation();
            $patient =new Patient();

            $patient->name=$request->patient_id;
            
            $reservation->save();

            //return \Response::json($response);

            return response()->json($reservation);

       // }

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
        //
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
    }
}
