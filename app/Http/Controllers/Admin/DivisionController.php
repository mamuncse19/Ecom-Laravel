<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Division;
use App\Model\District;

class DivisionController extends Controller
{
    public function index()
   {
   		$divisions = Division::orderBy('priority','asc')->get();
   		return view('admin.division.division',compact('divisions'));
   }

   public function store(Request $request)
   {
   		$validatedData = $request->validate([
        'name' => 'required|unique:divisions|max:255',
        'priority' => 'required|numeric'
    	]);

   		$division = new Division();
   		$division->name = $request->name;
   		$division->priority = $request->priority;
   		$division->save();
   			$sms = array(
   				'message' => 'Division Inserted Successfully.',
   				'alert-type' => 'success'
   			);
   			return Redirect()->route('divisions')->with($sms);
   		
   }

   public function edit($id)
   {
   		$division = Division::findOrFail($id);
   		return view('admin.division.editDivision',compact('division'));
   }

   public function update(Request $request,$id)
   {
   		$validatedData = $request->validate([
        'name' => 'required',
        'priority' => 'required'
    	]);

   		$division = Division::findOrFail($id);
   		$division->name = $request->name;
   		$division->priority = $request->priority;
   		$division->save();
   			$sms = array(
   				'message' => 'Division Updated Successfully.',
   				'alert-type' => 'success'
   			);
   			return Redirect()->route('divisions')->with($sms);
   		
   }

   public function destroy($id)
   {
   		$division = Division::findOrFail($id);
   		$district = District::where('division_id',$division->id)->get()->each->delete();
   		
   		$division->delete();
   		$sms = array(
   				'message' => 'Division Deleted Successfully.',
   				'alert-type' => 'success'
   			);
   			return Redirect()->route('divisions')->with($sms);
   	
   	
   }
}
