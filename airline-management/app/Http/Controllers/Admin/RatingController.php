<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rating=Rating::all();
        // return json_encode($rating);
        return response()->json([
            'rating'=>$rating
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
        $insert=DB::table('rating')->insert([
            "name"=>'Lim works',  
            "aircraft_type"=>'1',
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
        $rating=Rating::where('ratno',$id)->first();
        // return json_encode($rating);
        return response()->json([
            'rating'=>$rating
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
        $rating=Rating::where('ratno',$id)->first();
        // return json_encode($rating);
        return response()->json([
            'rating'=>$rating
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
        $rating = Rating::find($id);
        $rating->name=$request->name;
        $rating->aircraft_type=$request->aircraft_type;
        $rating->save();

        // return $note;
        $resp=[];

        if ($rating) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
        //  return json_encode($rating,$resp);
        return response()->json([
            'rating'=>$rating,
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
        $rating=Rating::where('ratno',$id)->delete();
        $resp=[];
        if ($rating) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
        //  return json_encode($rating,$resp);
        return response()->json([
            'rating'=>$rating,
            'message'=>$resp
        ]);
    }
}
