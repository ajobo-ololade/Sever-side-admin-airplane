<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Passenger;
use Illuminate\Support\Facades\DB;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $passenger=Passenger::all();
        return json_encode($passenger);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $insert=DB::table('passenger')->insert([
            "surname"=>'NNN',
            "othername"=>'Lim works',
            "address"=>'A30',  
            "phone"=>'A30',  
            "schedulenum"=>'1',  
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

        return json_encode($resp);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $passenger=Passenger::where('pasID',$id)->first();
        return json_encode($passenger);
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
        $passenger = Passenger::find($id);
        $passenger->surname=$request->surname;
        $passenger->othername=$request->othername;
        $passenger->address=$request->address;
        $passenger->phone=$request->phone;
        $passenger->schedulenum=$request->schedulenum;
        $passenger->save();

        // return $note;
        $resp=[];

        if ($passenger) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
         return json_encode($passenger,$resp);
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
        $passenger=Passenger::where('pasID',$id)->delete();
        $resp=[];
        if ($passenger) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
         return json_encode($passenger,$resp);
    }
}
