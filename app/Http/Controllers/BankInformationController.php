<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\FileType;
use App\ParsonalDetails;
use App\EmployeeDetails;
use App\GuarantorDetails;
use App\BankStatement;
use Carbon\Carbon;
use Redirect;

class BankInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckRole');
    }
	public function bank_home(Request $request)
	{
		$file_type = $request->session()->get('file_type');
		return view('bank.home',compact('file_type'));
	}
	// File POST
	public function file_post(Request $request)
	{
		$request->validate([
			'file' => 'required',
		]);
		if ($request->file == 1) {
			// FileType::insert([
			// 	'user_id' => Auth::id(),
			// 	'file' => $request->file,
			// 	'created_at' => Carbon::now(),
			// ]);
			$file_type = new FileType();
            $request->session()->put('file_type', $file_type);
        	return Redirect::to('bank_ca_personal_details')->with('edit_successs', 'User Information Update Successfully');
		}
		else
		{
			// FileType::insert([
			// 	'user_id' => Auth::id(),
			// 	'file' => $request->file,
			// 	'created_at' => Carbon::now(),
			// ]);
			$file_type = new FileType();
            $request->session()->put('file_type', $file_type);
        	return Redirect::to('bank_cs_personal_details')->with('edit_successs', 'User Information Update Successfully');

		}
		
	}
	// End File

	public function bank_ca_personal_details(Request $request)
    {
    	$file_type = $request->session()->get('file_type');
        return view('bank.ca.personal_details',compact('file_type'));
    }

    public function bank_cs_personal_details(Request $request)
    {
    	$file_type = $request->session()->get('file_type');
        return view('bank.cs.personal_details',compact('file_type'));
    }

    public function personal_details()
    {
    	return view('bank.personal_details');
    }
    public function bank_sample_post(Request $request)
    {
    	print_r($request->all());
    }
    public function personal_post(Request $request)
    {
        $request->validate([
            'file_name' => 'required|',
        ]);
        ParsonalDetails::insert($request->except('_token') + [
            'user_id' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
        $file_name_user = $request->file_name;
        return Redirect::to('/cs_employee_details')->with('message','Successfully');
    
    }
    //  Employee Details Page //
    public function cs_employee_details()
    {
    	return view('bank.cs.cs_employee_details');
    }
    public function employee_details_post(Request $request)
    {
        $request->validate([
            'file_name' => 'required',
        ]);
    	$qr_code = time().rand(99,1000);
    
    	EmployeeDetails::insert($request->except('_token') + [
            'user_id' => Auth::id(),
            'qr_code_employee' => $qr_code,
            'created_at' => Carbon::now(),
        ]);
        return Redirect::to('/bank_cs_gurantor_details')->with('message','Survey Create Successfully');
    }
    // End Employee Details Page //
    //  Guarantor Details Page //
    public function bank_cs_gurantor_details()
    {
        return view('bank.cs.guarantor_details');
    }
    public function guarantor_details_post(Request $request)
    {
        $request->validate([
            'file_name' => 'required',
        ]);
        $qr_code = time().rand(999,10000);
    
        GuarantorDetails::insert($request->except('_token') + [
            'user_id' => Auth::id(),
            'qr_code_guarantor' => $qr_code,
            'created_at' => Carbon::now(),
        ]);
        return Redirect::to('/bank_cs_statement_withdrawal')->with('message','Survey Create Successfully');
    }
    // End Guarantor Details //
    // Start Statement Withdrawal //
    public function bank_cs_statement_withdrawal()
    {
        return view('bank.cs.statement_withdrawal');
    }
    public function bank_statement_details_post(Request $request)
    {
        $request->validate([
            'file_name' => 'required',
        ]);
        $qr_code = time().rand(999,10000);
    
        $cs_bank_id = BankStatement::insertGetId($request->except('_token','statement_check') + [
            'user_id' => Auth::id(),
            'statement_check' => implode(',', (array) $request->get('statement_check')),
            'qr_code_statement' => $qr_code,
            'created_at' => Carbon::now(),
        ]);


        return Redirect::to('/home')->with('message','Survey Create Successfully');
    }

}
