<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\AssignSurveyImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\AssignSurvey;

class AssignFileUploadController extends Controller
{
    // public function index()
    // {
    // 	$all_file = AssignSurvey::orderBy('id','desc')->get();
    // 	return view('admin.assign.fileupload',compact('all_file'));
    // }
    // public function index()
    // {
    // 	$all_assign = AssignSurvey::where('status',1)->orderBy('id','desc')->get();
    // 	return view('admin.assign.assign_agent',compact('all_assign'));
    // }
    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required',
        ]);
        Excel::import(new AssignSurveyImport, request()->file('import_file'));
        return back()->with('success', 'File imported successfully.');
    }
    // public function delete_file($file_id)
    // {
    // 	AssignSurvey::find($file_id)->delete();
    // 	return back()->with('delete','File Delete successfully');
    // }
}
