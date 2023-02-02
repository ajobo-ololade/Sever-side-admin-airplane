<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AirplaneType;
use Illuminate\Support\Facades\DB;

class AirplaneTypeController extends Controller
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
        // return json_encode($airplanetype);
        return response()->json([
            'airplanetype'=>$airplanetype
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
        $insert=DB::table('airplane_type')->insert([
            "name"=>$request->name,  
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $airplanetype=AirplaneType::where('type_id',$id)->first();
        // return json_encode($airplanetype);
        return response()->json([
            'airplanetype'=>$airplanetype
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
        $airplanetype=AirplaneType::where('type_id',$id)->first();
        // return json_encode($airplanetype);
        return response()->json([
            'airplanetype'=>$airplanetype
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
         
        //  return json_encode($airplanetype,$resp);
         return response()->json([
            'airplanetype'=>$airplanetype,
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
        $airplanetype=AirplaneType::where('typeid',$id)->delete();
        $resp=[];
        if ($airplanetype) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
        //  return json_encode($airplanetype,$resp);
         return response()->json([
            'airplanetype'=>$airplanetype,
            'message'=>$resp
        ]);
    }
  
}
