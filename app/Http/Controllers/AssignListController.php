<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssignSurvey;
use Auth;

class AssignListController extends Controller
{
    public function assign_list()
    {
    	$get_assign_list = AssignSurvey::where('agent_name',Auth::id())->where('status',1)->where('task_status',0)->get();
    	return view('agent.list',compact('get_assign_list'));
    }
}
