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
    public function store(Request $request)
    {
        $newItem = new Employee;
        $newItem->name = $request->item['name'];
        $newItem->save();
 
        return $newItem;
    }
    public function update(Request $request, $id)
    {
        $existingItem = Employee::find($id);  
 
        if($existingItem){
           $existingItem->completed = $request->item['completed'] ? true : false;
           $existingItem->updated_at = Carbon::now() ;
           $existingItem->save();
           return $existingItem;
 
        } 
        return "Item not found";
    }
    public function destroy($id)
    {
        $existingItem = Employee::find($id);
        if($existingItem){
           $existingItem->delete();
           return "Item deleted";
        }
        return "Item not found";
    }
}
