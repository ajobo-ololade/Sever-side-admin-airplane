<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;
class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schedule=Schedule::all();
        return json_encode($schedule);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $insert=DB::table('schedule')->insert([
            "flightnum"=>'1',
            "arr_time"=>'22',
            "dep_time"=>'22',  
            "arr"=>'22',  
            "des"=>'22',  
            "airplaneid"=>'2',  
            "capacity"=>'A30',  
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
        $schedule=Schedule::where('schedulenum',$id)->first();
        return json_encode($schedule);
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
        $schedule = Schedule::find($id);
        $schedule->flightnum=$request->flightnum;
        $schedule->arr_time=$request->arr_time;
        $schedule->dep_time=$request->dep_time;
        $schedule->arr=$request->arr;
        $schedule->des=$request->des;
        $schedule->airplaneid=$request->airplaneid;
        $schedule->capacity=$request->capacity;
        $schedule->save();

        // return $note;
        $resp=[];

        if ($schedule) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
         return json_encode($schedule,$resp);
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
        $schedule=Schedule::where('schedulenum',$id)->delete();
        $resp=[];
        if ($schedule) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
         return json_encode($schedule,$resp);
    }
}
