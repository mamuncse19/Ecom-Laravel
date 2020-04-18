<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\District;

class DistrictController extends Controller
{
    public function index()
   {
   		$districts = District::orderBy('name','asc')->get();
   		return view('admin.district.district',compact('districts'));
   }

   public function store(Request $request)
   {
   		$validatedData = $request->validate([
        'name' => 'required|unique:districts|max:255',
        'division_id' => 'required'
    	]);

   		$district = new District();
   		$district->name = $request->name;
   		$district->division_id = $request->division_id;
   		$district->save();
   			$sms = array(
   				'message' => 'District Inserted Successfully.',
   				'alert-type' => 'success'
   			);
   			return Redirect()->route('districts')->with($sms);
   		
   }

   public function edit($id)
   {
   		$district = District::findOrFail($id);
   		return view('admin.district.editDistrict',compact('district'));
   }

   public function update(Request $request,$id)
   {
   		$validatedData = $request->validate([
        'name' => 'required',
        'division_id' => 'required'
    	]);

   		$district = District::findOrFail($id);
   		$district->name = $request->name;
   		$district->division_id = $request->division_id;
   		$district->save();
   			$sms = array(
   				'message' => 'District Updated Successfully.',
   				'alert-type' => 'success'
   			);
   			return Redirect()->route('districts')->with($sms);
   		
   }

   public function destroy($id)
   {
   		$division = District::findOrFail($id);
   		$division->delete();
   		$sms = array(
   				'message' => 'District Deleted Successfully.',
   				'alert-type' => 'success'
   			);
   			return Redirect()->route('districts')->with($sms);
   	
   	
   }
}
