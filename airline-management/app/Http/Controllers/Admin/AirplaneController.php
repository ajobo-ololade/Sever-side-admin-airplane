<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Airplane;
use Illuminate\Support\Facades\DB;  // query selector

class AirplaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $airplane=Airplane::all();
        // return json_encode($airplane);
        return response()->json([
            'airplane'=>$airplane
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $insert=DB::table('airplane')->insert([
            "aircraft_type"=>$request->aircraft_type,
            "manufacturer"=>$request->manufacturer,
            "model"=>$request->model,  
         ]);
           $resp=[];
          if ($insert) 
           { 
                $resp['success']=true;
           }

          else
            {
                 $resp['success']=false;
            }
        return response()->json([
            'message'=>$resp
        ]);
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
        $airplane=Airplane::where('numser',$id)->first();
        return response()->json([
            'airplane'=>$airplane
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $airplane=Airplane::where('numser',$id)->first();
        return response()->json([
            'airplane'=>$airplane
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
        //
        $airplane = Airplane::find($id);
        $airplane->manufacturer=$request->manufacturer;
        $airplane->model=$request->model;
        $airplane->aircraft_type=$request->aircraft_type;
        $airplane->save();

        // return $note;
        $resp=[];

        if ($airplane) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
        //  return json_encode($airplane,$resp);
         return response()->json([
            'airplane'=>$airplane,
            'message'=>$resp
        ]);
        ;
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
        $airplane=Airplane::where('numser',$id)->delete();
        $resp=[];
        if ($airplane) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
        //  return json_encode($airplane,$resp);
         return response()->json([
            'airplane'=>$airplane,
            'message'=>$resp
        ]);
    }
}
