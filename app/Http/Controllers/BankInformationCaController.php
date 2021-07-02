<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\CAPersonalDetails;
use App\CAEmploymentDetails;
use App\CABankStatement;
use Redirect;

class BankInformationCaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckRole');
    }
    public function personal_ca_post(Request $request)
    {
        $request->validate([
            'file_name' => 'required',
        ]);
    	$qr_code = time().rand(99,1000);
    	CAPersonalDetails::insert($request->except('_token') + [
            'user_id' => Auth::id(),
            'ca_qr_per_code' => $qr_code,
            'created_at' => Carbon::now(),
        ]);
        $file_name_user = $request->file_name;
        return Redirect::to('/ca_employee_details')->with('message','Successfully');
    }
    public function ca_employee_details()
    {
    	return view('bank.ca.employee_details');
    }
    public function employment_ca_post(Request $request)
    {
        $request->validate([
            'file_name' => 'required',
        ]);
    	$qr_code = time().rand(99,1000);
    	CAEmploymentDetails::insert($request->except('_token') + [
            'user_id' => Auth::id(),
            'ca_qr_employment' => $qr_code,
            'created_at' => Carbon::now(),
        ]);
        $file_name_user = $request->file_name;
        return Redirect::to('/ca_bank_statement')->with('message','Successfully');
    }
    public function ca_bank_statement()
    {
    	return view('bank.ca.bank_statement');
    }
    public function bank_statement_ca_post(Request $request)
    {
        $request->validate([
            'file_name' => 'required',
        ]);
    	$qr_code = time().rand(99,1000);
    	CABankStatement::insert($request->except('_token','ca_check_verify') + [
            'user_id' => Auth::id(),
            'ca_check_verify' => implode(',', (array) $request->get('ca_check_verify')),
            'ca_qr_bank' => $qr_code,
            'created_at' => Carbon::now(),
        ]);

      

        $file_name_user = $request->file_name;
        return Redirect::to('/home')->with('message','CA Create Successfully');
    }
}
