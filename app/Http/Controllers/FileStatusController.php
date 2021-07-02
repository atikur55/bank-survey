<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssignSurvey;

class FileStatusController extends Controller
{
    public function complete_files()
    {
        $complete_files = AssignSurvey::where('task_status',1)->get();
        return view('admin.file.complete',compact('complete_files'));
    }
    public function incomplete_files()
    {
        $incomplete_files = AssignSurvey::where('task_status',0)->get();
        return view('admin.file.incomplete',compact('incomplete_files'));
    }
}
