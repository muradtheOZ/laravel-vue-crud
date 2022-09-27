<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
       return Employee::orderBy('created_at', 'desc')->get();
    }
    public function saveEmployee(Request $request)
    {
        $newEmployee = new Employee;
        $newEmployee->name = $request->employee['name'];
        $newEmployee->email = $request->employee['email'];
        $newEmployee->phone = $request->employee['phone'];
        $newEmployee->team = $request->employee['team'];
        $newEmployee->save();
 
        return $newEmployee;
    }
    public function updateEmployee(Request $request, $id)
    {
        $existingEmployee = Employee::find($id);  
 
        if($existingEmployee){
           $existingEmployee->name = $request->employee['name'];
           $existingEmployee->email = $request->employee['email'];
           $existingEmployee->phone = $request->employee['phone'];
           $existingEmployee->team = $request->employee['team'];
           $existingEmployee->updated_at = Carbon::now() ;
           $existingEmployee->save();
           return $existingEmployee;
 
        } 
        return "Employee not found";
    }
    public function deleteEmployee($id)
    {
        $existingEmployee = Employee::find($id);
        if($existingEmployee){
           $existingEmployee->delete();
           return "Employee deleted";
        }
        return "Employee not found";
    }
}
