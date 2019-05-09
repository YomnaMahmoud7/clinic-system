<?php

namespace App\Http\Controllers\Drugs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Drug;
use App\Model\Rochta;


class DrugRochtaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            $rochta = Rochta::find($rochta_id);
            $drug= $rochta-> drugs()->attach($drug_id);
            return response($drug); 
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
        $rochta = Rochta::find($rochta_id);
        $drug= $rochta-> drugs()->detach($drug_id);
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
