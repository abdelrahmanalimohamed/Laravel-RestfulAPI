<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $emp = Employee::all();

        return EmployeeResource::collection($emp);
    }


    public function store(Request $request)
    {
        $emp = new Employee;
        $emp->salary = $request->input('salary');
        $emp->emp_name = $request->input('emp_name');
        $emp->job_description = $request->input('job');
        $emp->save();
        return new EmployeeResource($emp);
    }



    public function show($id)
    {
        $emp = Employee::find($id);
        if( $emp ){
            return new EmployeeResource($emp);
        }
        return "Employee Not found";
    }

   

   
    public function update(Request $request, $id)
    {
        $emp = Employee::find($id);
        $emp->salary = $request->input('salary');
        $emp->emp_name = $request->input('emp_name');
        $emp->job_description = $request->input('job');
        $emp->save();
        return new EmployeeResource($emp);
    }

    
    public function destroy($id)
    {
        $emp = Employee::findOrfail($id);
        if($emp->delete()){
            return  new EmployeeResource($emp);
        }
        return "Error while deleting";
    }
}
