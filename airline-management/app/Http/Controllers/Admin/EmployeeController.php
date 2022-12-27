<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employee=Employee::all();
        // return json_encode($employee);
        return response()->json([
            'employee'=>$employee
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
        $insert=DB::table('employee')->insert([
            "surname"=>'AAA',
            "name"=>'Lim works',
            "address"=>'A30',  
            "phone"=>'A30',  
            "salary"=>'30000',  
            "ratingid"=>'1',  
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
        $employee=Employee::where('empnum',$id)->first();
        // return json_encode($employee);
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
        $employee=Employee::where('empnum',$id)->first();
        // return json_encode($employee);
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
        $employee = Employee::find($id);
        $employee->surname=$request->surname;
        $employee->name=$request->name;
        $employee->address=$request->address;
        $employee->phone=$request->phone;
        $employee->salary=$request->salary;
        $employee->ratingid=$request->ratingid;
        $employee->save();

        // return $note;
        $resp=[];

        if ($employee) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
        //  return json_encode($employee,$resp);
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
        $employee=Employee::where('empnum',$id)->delete();
        $resp=[];
        if ($employee) 
        { 
             $resp['success']=true;
        }

       else
         {
              $resp['success']=false;
         }
         
        //  return json_encode($employee,$resp);
        return response()->json([
            'employee'=>$employee,
            'message'=>$resp
        ]);
    }
}
