<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Crew;
use Illuminate\Support\Facades\DB;

class CrewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $crew=Crew::all();
        // return json_encode($crew);
        return response()->json([
            'crew'=>$crew
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
        $insert=DB::table('crew')->insert([
            "empnum"=>$request->empnum,
            "scheduleid"=>$request->scheduleid,
            "role"=>$request->role,  
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
        $crew=Crew::where('crewid',$id)->first();
        // return json_encode($crew);
        return response()->json([
            'crew'=>$crew
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
        $crew=Crew::where('crewid',$id)->first();
        // return json_encode($crew);
        return response()->json([
            'crew'=>$crew
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
        $crew = Crew::find($id);
        $crew->empnum=$request->empnum;
        $crew->scheduleid=$request->scheduleid;
        $crew->role=$request->role;
        $crew->save();

        // return $note;
        $resp=[];

        if ($crew) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
        //  return json_encode($crew,$resp);
        return response()->json([
            'crew'=>$crew,
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
        $crew=Crew::where('crewid',$id)->delete();
        $resp=[];
        if ($crew) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
        //  return json_encode($crew,$resp);
        return response()->json([
            'crew'=>$crew,
            'message'=>$resp
        ]);
    }
}
