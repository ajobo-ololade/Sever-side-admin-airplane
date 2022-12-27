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
        return json_encode($crew);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $insert=DB::table('crew')->insert([
            "empnum"=>'1',
            "scheduleid"=>'1',
            "role"=>'pilot',  
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
        $crew=Crew::where('crewid',$id)->first();
        return json_encode($crew);
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
         
         return json_encode($crew,$resp);
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
         
         return json_encode($crew,$resp);
    }
}
