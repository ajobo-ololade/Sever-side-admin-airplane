<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flight;
use Illuminate\Support\Facades\DB;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $flight=Flight::all();
        // return json_encode($flight);
        return response()->json([
            'flight'=>$flight
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
        $insert=DB::table('flight')->insert([
            "flightdate"=>'1',
            "origin"=>'Lim works',
            "destination"=>'A30',  
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

        // return json_encode($resp);
        return response()->json([
            'message'=>$resp
        ]);
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
        $flight=Flight::where('flightnum',$id)->first();
        // return json_encode($flight);
        return response()->json([
            'employee'=>$employee
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
        $flight=Flight::where('flightnum',$id)->first();
        // return json_encode($flight);
        return response()->json([
            'employee'=>$employee
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
        $flight = Flight::find($id);
        $flight->flightdate=$request->flightdate;
        $flight->origin=$request->origin;
        $flight->destination=$request->destination;
        $flight->save();

        // return $note;
        $resp=[];

        if ($flight) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
        //  return json_encode($flight,$resp);
        return response()->json([
            'employee'=>$employee,
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
        $flight=Flight::where('flightnum',$id)->delete();
        $resp=[];
        if ($flight) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
        //  return json_encode($flight,$resp);
        return response()->json([
            'employee'=>$employee,
            'message'=>$resp
        ]);
    }
}
