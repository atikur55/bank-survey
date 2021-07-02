<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SelectZone;
use Carbon\Carbon;

class SelectZoneController extends Controller
{
    public function create_zone()
    {
    	return view('admin.create_zone.create');
    }
    public function create_zone_post(Request $request)
    {
    	$request->validate([
    		'zone_name' => 'required|unique:select_zones',	
    	]);

    	SelectZone::insert([
    		'zone_name' => $request->zone_name,
    		'created_at' => Carbon::now(),
    	]);
    	return back()->with('success','Zone Created Successfully');
    }
    public function zone_view()
    {
    	$all_zone = SelectZone::orderBy('id','desc')->get();
    	return view('admin.create_zone.view',compact('all_zone'));
    }
    public function create_active_zone($zone_id)
    {
    	$zone = SelectZone::find($zone_id);
    	if ($zone->status == 0) {
    		SelectZone::find($zone_id)->update([
    			'status' => 1,
    		]);
    	}
    	else
    	{
    		SelectZone::find($zone_id)->update([
    			'status' => 0,
    		]);
    	}
    	return back();
    }
    public function create_edit_zone($zone_id)
    {
    	$zone = SelectZone::find($zone_id);
    	return view('admin.create_zone.edit',compact('zone'));
    }
    public function create_edit_zone_post(Request $request)
    {
    	SelectZone::find($request->id)->update([
    		'zone_name' => $request->zone_name,
    		'created_at' => Carbon::now(),
    	]);
    	return back()->with('success','Zone Created Successfully');
    }
    public function create_delete_zone($zone_id)
    {
    	SelectZone::find($zone_id)->delete();
    	return back()->with('delete','Zone Delete Successfully');
    }
}
