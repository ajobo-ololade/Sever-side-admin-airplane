<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AirplaneType;
use Illuminate\Support\Facades\DB;

class AirplaneTypeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $airplanetype=AirplaneType::all();
        return json_encode($airplanetype);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $insert=DB::table('airplane_type')->insert([
            "name"=>'A30',  
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
        $airplanetype=AirplaneType::where('type_id',$id)->first();
        return json_encode($airplanetype);
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
        $airplanetype = AirplaneType::find($id);
        $airplanetype->name=$request->name;
        $airplanetype->save();

        // return $note;
        $resp=[];

        if ($airplanetype) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
         return json_encode($airplanetype,$resp);
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
        $airplanetype=AirplaneType::where('type_id',$id)->delete();
        $resp=[];
        if ($airplanetype) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
         return json_encode($airplanetype,$resp);
    }
  
}
