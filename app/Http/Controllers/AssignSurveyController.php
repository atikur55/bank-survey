<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssignSurvey;
use App\User;
use Carbon\Carbon;
use App\Zone;
use App\SelectZone;

class AssignSurveyController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckRole');
    }
    public function index()
    {
    	// $all_assign = AssignSurvey::where('status',1)->orderBy('id','desc')->get();
        $all_assign = AssignSurvey::orderBy('id','desc')->get();
    	return view('admin.assign.assign_agent',compact('all_assign'));
    }
    public function add_assign()
    {
    	$agents = User::where('role',0)->get();
        // $zone_list = Zone::where('status',1)->get();
        $zone_list = Zone::distinct()->get(['zone_number']);
        $zone_area = Zone::distinct()->get(['zone_area']);
        $zones = SelectZone::where('status',1)->get();
        // print_r($zone_list);
        // die();
    	return view('admin.assign.add_assign',compact('agents','zone_list','zone_area','zones'));
    }
    public function assign_post(Request $request)
    {
    	$request->validate([
    		'agent_name' => 'required',
    		'filename' => 'required',
            'file_type' =>'required',
            'zone' =>'required',
    		'task' => 'required',
    		'date' => 'required',
    		'status' => 'required',
    	]);

    	AssignSurvey::insert([
    		'agent_name' => $request->agent_name,
    		'filename' => $request->filename,
            'file_type' => $request->file_type,
            'zone' => $request->zone,
            'area_id' => $request->area_id,
    		'task' => implode(',', (array) $request->get('task')),
    		'date' => $request->date,
    		'sla_date' => $request->sla_date,
    		'inout_data' => $request->inout_data,
    		'status' => $request->status,
    		'created_at' => Carbon::now(),
    	]);
   
    	return back()->with('message','Assign Create Successfully. Now You have to Create Your File Name');
    	// print_r($request->all());
    }

    public function edit_assign($assign_id)
    {
    	$get_assign = AssignSurvey::find($assign_id);
    	$agents = User::where('role',0)->get();
        $zones = SelectZone::where('status',1)->get();
        $checkbox_value = explode(",",$get_assign->task);
        // print_r($checkbox_value);die();
    	return view('admin.assign.edit_assign',compact('get_assign','agents','checkbox_value','zones'));
    }
    public function edit_assign_post(Request $request)
    {
    	AssignSurvey::where('id',$request->id)->update([
    		'agent_name' => $request->agent_name,
            'file_type' => $request->file_type,
            'filename' => $request->filename,
    		'zone' => $request->zone,
            'area_id' => $request->area_id,
    		'task' => implode(',', (array) $request->get('task')),
    		'date' => $request->date,
            'sla_date' => $request->sla_date,
    		'inout_data' => $request->inout_data,
    		'status' => $request->status,
    		'created_at' => Carbon::now(),
    	]);
   
    	return back()->with('message','Assign Update Successfully');
    }
    public function delete_assign($assign_id)
    {
    	AssignSurvey::where('id',$assign_id)->delete();
    	return back()->with('delete','Assign Delete Successfully');
    }
    // Condition Check On CA or CS File //
    public function view_cs_ca($assign_id)
    {
        $assign = AssignSurvey::find($assign_id);
        if($assign->file_type == 1)
        {
            $file_info = AssignSurvey::find($assign_id); 
            return view('bank.ca.personal_details',compact('file_info'));
        }
        else
        {
            $file_info = AssignSurvey::find($assign_id); 
            return view('bank.cs.personal_details',compact('file_info'));
        }
    }

    public function get_area(Request $request){
        $city_item = '';
        $cities = Zone::where('zone_number',$request->zone_id)->get();
        foreach ($cities as $city){
           $city_item .= "<option value = '".$city->id."'>".$city->zone_area."</option>";
        }
        echo $city_item;
    }

      public function get_area_edit(Request $request){
        $city_item = '';
        $cities = Zone::where('zone_number',$request->zone_id)->get();
        foreach ($cities as $city){
           $city_item .= "<option value = '".$city->id."'>".$city->zone_area."</option>";
        }
        echo $city_item;
    }
    public function active_task($id)
    {
        $task_id = AssignSurvey::find($id);
        
        if ($task_id->task_status == 0) {
            AssignSurvey::find($id)->update([
                'task_status' => 1,
            ]);
        } else {
            AssignSurvey::find($id)->update([
                'task_status' => 0,
            ]);
        }
        
        return back();
    }

}
