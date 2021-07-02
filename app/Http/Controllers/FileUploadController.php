<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ImportFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\FileUpload;
use App\ParsonalDetails;
use App\EmployeeDetails;
use App\GuarantorDetails;
use App\BankStatement;
use App\Par;
use Carbon\Carbon;

class FileUploadController extends Controller
{
    public function index()
    {
    	$all_file = FileUpload::orderBy('id','desc')->get();
    	return view('admin.assign.fileupload',compact('all_file'));
    }
    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required',
        ]);
        $data = Excel::import(new ImportFileUploads, request()->file('import_file'));
        $all_data = FileUpload::whereDate('created_at', Carbon::today())->get();
        foreach($all_data as $data)
        {
            ParsonalDetails::create([
                'file_name' => $data->filename,
            ]);
            EmployeeDetails::create([
                'file_name' => $data->filename,
            ]);
            GuarantorDetails::create([
                'file_name' => $data->filename,
            ]);
            BankStatement::create([
                'file_name' => $data->filename,
            ]);
        }
        
        return back()->with('success', 'File imported successfully.');
    }
    public function delete_file_cs($file_id)
    {
    	// FileUpload::find($file_id)->delete();
        $filename = FileUpload::find($file_id);
        $file = $filename->filename;
        FileUpload::where('filename',$file)->delete();
        ParsonalDetails::where('file_name',$file)->delete();
        EmployeeDetails::where('file_name',$file)->delete();
        GuarantorDetails::where('file_name',$file)->delete();
        BankStatement::where('file_name',$file)->delete();
    	return back()->with('delete','File Delete successfully');
    }
}
