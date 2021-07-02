<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileCAUpload;
use App\Imports\FileUploadCA;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\CAPersonalDetails;
use App\CAEmploymentDetails;
use App\CABankStatement;
use Carbon\Carbon;


class FileUploadCAController extends Controller
{
    public function index()
    {
    	$all_file = FileCAUpload::orderBy('id','desc')->get();
    	return view('admin.assign.fileuploadca',compact('all_file'));
    }
    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required',
        ]);
        $data = Excel::import(new FileUploadCA, request()->file('import_file'));
        $all_data = FileCAUpload::whereDate('created_at', Carbon::today())->get();
        foreach($all_data as $data)
        {
            CAPersonalDetails::create([
                'file_name' => $data->filename,
            ]);
            CAEmploymentDetails::create([
                'file_name' => $data->filename,
            ]);
            CABankStatement::create([
                'file_name' => $data->filename,
            ]);
        }
        
        return back()->with('success', 'File imported successfully.');
    }
    public function delete_file_ca($file_id)
    {
    	$filename = FileCAUpload::find($file_id);
    	$file = $filename->filename;
    	FileCAUpload::where('filename',$file)->delete();
    	CAPersonalDetails::where('file_name',$file)->delete();
    	CAEmploymentDetails::where('file_name',$file)->delete();
    	CABankStatement::where('file_name',$file)->delete();
    	return back()->with('delete','File Delete successfully');
    }
}
