<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zone;
use Carbon\Carbon;
use App\SelectZone;

class ZoneController extends Controller
{
    public function zone()
    {
        $zones = SelectZone::where('status',1)->get();
    	return view('admin.zone.create',compact('zones'));
    }
    public function zone_post(Request $request)
    {
    	$request->validate([
    		'zone_number' => 'required',
    		'zone_area' => 'required',	
    	]);

    	Zone::insert([
    		'zone_number' => $request->zone_number,
    		'zone_area' => $request->zone_area,
    		'created_at' => Carbon::now(),
    	]);
    	return back()->with('success','Zone Created Successfully');
    }
    public function view_zone()
    {
    	$all_zone = Zone::orderBy('id','desc')->get();
    	return view('admin.zone.view',compact('all_zone'));
    }
    public function active_zone($zone_id)
    {
    	$zone = Zone::find($zone_id);
    	if ($zone->status == 0) {
    		Zone::find($zone_id)->update([
    			'status' => 1,
    		]);
    	}
    	else
    	{
    		Zone::find($zone_id)->update([
    			'status' => 0,
    		]);
    	}
    	return back();
    }
    public function edit_zone($zone_id)
    {
    	$zone = Zone::find($zone_id);
    	return view('admin.zone.edit',compact('zone'));
    }
    public function edit_zone_post(Request $request)
    {
    	Zone::find($request->id)->update([
    		'zone_number' => $request->zone_number,
    		'zone_area' => $request->zone_area,
    		'created_at' => Carbon::now(),
    	]);
    	return back()->with('success','Zone Created Successfully');
    }
    public function delete_zone($zone_id)
    {
    	Zone::find($zone_id)->delete();
    	return back()->with('delete','Zone Delete Successfully');
    }
}
