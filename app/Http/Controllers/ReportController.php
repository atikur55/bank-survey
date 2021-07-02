<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssignSurvey;
use App\ParsonalDetails;
use App\EmployeeDetails;
use App\GuarantorDetails;
use App\BankStatement;
use App\CAPersonalDetails;
use App\CAEmploymentDetails;
use App\Ca_Multiple_photo;
use App\CABankStatement;
use App\Caphoto;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AssignSurveyExport;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\CsPersonalPhoto;
use App\CsEmploymentPhoto;
use App\CsGuarantorPhoto;
use App\CaPersonalPhoto;
use App\CaEmploymentPhoto;


class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function report($file_id)
    {
    	$file = AssignSurvey::find($file_id);
    	if ($file->file_type == 2) {
    		$file = AssignSurvey::find($file_id);
            $file_name = $file->filename;
    		$personal_info = ParsonalDetails::where('file_name',$file->filename)->first();
    		$employment_info = EmployeeDetails::where('file_name',$file->filename)->first();
            $guarantor_info = GuarantorDetails::where('file_name',$file->filename)->first();
            $bank_statement_info = BankStatement::where('file_name',$file->filename)->first();
            $get_photo = Ca_Multiple_photo::where('file_name',$file->filename)->get();
            $cs_personal_photo = CsPersonalPhoto::where('file_name',$file->filename)->get();
            $cs_employment_photo = CsEmploymentPhoto::where('file_name',$file->filename)->get();
            $cs_guarantor_photo = CsGuarantorPhoto::where('file_name',$file->filename)->get();
            if(empty($personal_info->file_name))
            {
                return view('bank.report.message_file',compact('file_name'));
            }
            else
            {
                return view('bank.report.cs_file',compact('personal_info','employment_info','get_photo','guarantor_info','bank_statement_info','cs_personal_photo','cs_employment_photo','cs_guarantor_photo'));
            }

    		// return view('bank.report.cs_file',compact('personal_info','employment_info','get_photo','guarantor_info','bank_statement_info'));
    	}
    	else
    	{
    		$file = AssignSurvey::find($file_id);
            $file_name = $file->filename;
    		$ca_personal_info = CAPersonalDetails::where('file_name',$file->filename)->first();
    		$ca_employment_info = CAEmploymentDetails::where('file_name',$file->filename)->first();
            $ca_bank_info = CABankStatement::where('file_name',$file->filename)->first();
            $get_photo = Caphoto::where('file_name',$file->filename)->get();
            $ca_personal_photo = CaPersonalPhoto::where('file_name',$file->filename)->get();
            $ca_employment_photo = CaEmploymentPhoto::where('file_name',$file->filename)->get();

            if(empty($ca_personal_info->file_name))
            {
                return view('bank.report.ca_message_file',compact('file_name'));
            }
            else
            {
                return view('bank.report.ca_file',compact('ca_personal_info','ca_employment_info','get_photo','ca_bank_info','ca_personal_photo','ca_employment_photo'));
            }
    		// return view('bank.report.ca_file',compact('ca_personal_info','ca_employment_info','get_photo','ca_bank_info'));

    	}
    }
    public function download($file_id)
    {
        $file = AssignSurvey::find($file_id);
        if($file->file_type == 2)
        {
            
            $file_info = AssignSurvey::findOrFail($file_id);
            $personal_info = ParsonalDetails::where('file_name',$file_info->filename)->first();
            $employment_info = EmployeeDetails::where('file_name',$file->filename)->first();
            $guarantor_info = GuarantorDetails::where('file_name',$file->filename)->first();
            $bank_statement_info = BankStatement::where('file_name',$file->filename)->first();
            $file_pdf = PDF::loadView('bank.download.fileofCS',$file_info,compact('personal_info','employment_info','guarantor_info','bank_statement_info','file_info'));
            $dynamic_name = $file_info->filename.".pdf";
            return $file_pdf->download($dynamic_name);
        }
        else
        {
            $file_info = AssignSurvey::findOrFail($file_id);
            $ca_personal_info = CAPersonalDetails::where('file_name',$file->filename)->first();
            $ca_employment_info = CAEmploymentDetails::where('file_name',$file->filename)->first();
            $ca_bank_info = CABankStatement::where('file_name',$file->filename)->first();
            $file_pdf = PDF::loadView('bank.download.fileofCA', $file_info,compact('ca_personal_info','ca_employment_info','ca_bank_info','file_info'));
            $dynamic_name = $file_info->filename.".pdf";
            return $file_pdf->download($dynamic_name);
        }
    }

    // public function export()
    // {
    //     return Excel::download(new AssignSurveyExport, 'AssignSurvey.xlsx');
    // }
    public function show_report($id)
    {
        $file = AssignSurvey::find($id);
        if($file->file_type == 2)
        {   
            $file_info = AssignSurvey::findOrFail($id);
            $personal_info = ParsonalDetails::where('file_name',$file_info->filename)->first();
            $employment_info = EmployeeDetails::where('file_name',$file->filename)->first();
            $guarantor_info = GuarantorDetails::where('file_name',$file->filename)->first();
            $bank_statement_info = BankStatement::where('file_name',$file->filename)->first();
            $get_photo = Ca_Multiple_photo::where('file_name',$file->filename)->get();
            $cs_personal_photo = CsPersonalPhoto::where('file_name',$file->filename)->get();
            $cs_employment_photo = CsEmploymentPhoto::where('file_name',$file->filename)->get();
            $cs_guarantor_photo = CsGuarantorPhoto::where('file_name',$file->filename)->get();
            return view('bank.report.bank_cs_report',compact('personal_info','employment_info','guarantor_info','bank_statement_info','file_info','get_photo','cs_personal_photo','cs_employment_photo','cs_guarantor_photo'));
        }
        else
        {
            $file_info = AssignSurvey::findOrFail($id);
            $ca_personal_info = CAPersonalDetails::where('file_name',$file->filename)->first();
            $ca_employment_info = CAEmploymentDetails::where('file_name',$file->filename)->first();
            $ca_bank_info = CABankStatement::where('file_name',$file->filename)->first();
            $get_photo = Caphoto::where('file_name',$file->filename)->get();
            $ca_personal_photo = CaPersonalPhoto::where('file_name',$file->filename)->get();
            $ca_employment_photo = CaEmploymentPhoto::where('file_name',$file->filename)->get();
            return view('bank.report.bank_ca_report',compact('ca_personal_info','ca_employment_info','ca_bank_info','file_info','get_photo','ca_personal_photo','ca_employment_photo'));
        }
    }
    public function update_notification_file($id)
    {
        $file = BankStatement::find($id);
        $file_name = AssignSurvey::where('filename',$file->file_name)->first();
        if($file_name->file_type == 2)
        {   
            $file_info = AssignSurvey::where('filename',$file->file_name)->first();
            $personal_info = ParsonalDetails::where('file_name',$file_info->filename)->first();
            $employment_info = EmployeeDetails::where('file_name',$file_info->filename)->first();
            $guarantor_info = GuarantorDetails::where('file_name',$file_info->filename)->first();
            $bank_statement_info = BankStatement::where('file_name',$file_info->filename)->first();
            $get_photo = Ca_Multiple_photo::where('file_name',$file_info->filename)->get();
            $cs_personal_photo = CsPersonalPhoto::where('file_name',$file_info->filename)->get();
            $cs_employment_photo = CsEmploymentPhoto::where('file_name',$file_info->filename)->get();
            $cs_guarantor_photo = CsGuarantorPhoto::where('file_name',$CABankStatement->filename)->get();
            BankStatement::find($id)->update([
                'status' => 2,
            ]);
            return view('bank.report.bank_cs_report',compact('personal_info','employment_info','guarantor_info','bank_statement_info','file_info','get_photo','cs_personal_photo','cs_employment_photo','cs_guarantor_photo'));
        }
        else
        {
            $file_info = AssignSurvey::where('filename',$file->file_name)->first();
            $ca_personal_info = CAPersonalDetails::where('file_name',$file_info->filename)->first();
            $ca_employment_info = CAEmploymentDetails::where('file_name',$file_info->filename)->first();
            $ca_bank_info = CABankStatement::where('file_name',$file_info->filename)->first();
            $get_photo = Caphoto::where('file_name',$file_info->filename)->get();
            $ca_personal_photo = CaPersonalPhoto::where('file_name',$file_info->filename)->get();
            $ca_employment_photo = CaEmploymentPhoto::where('file_name',$file_info->filename)->get();
            CABankStatement::find($id)->update([
                'status' => 2,
            ]);
            return view('bank.report.bank_ca_report',compact('ca_personal_info','ca_employment_info','ca_bank_info','file_info','get_photo','ca_personal_photo','ca_employment_photo'));
        }
        
    }
    public function update_ca_notification_file($id)
    {
        $file = CABankStatement::find($id);
        $file_info = AssignSurvey::where('filename',$file->file_name)->first();
        $ca_personal_info = CAPersonalDetails::where('file_name',$file_info->filename)->first();
        $ca_employment_info = CAEmploymentDetails::where('file_name',$file_info->filename)->first();
        $ca_bank_info = CABankStatement::where('file_name',$file_info->filename)->first();
        $get_photo = Caphoto::where('file_name',$file_info->filename)->get();
        $ca_personal_photo = CaPersonalPhoto::where('file_name',$file_info->filename)->get();
        $ca_employment_photo = CaEmploymentPhoto::where('file_name',$file_info->filename)->get();
        CABankStatement::find($id)->update([
            'status' => 2,
        ]);
        return view('bank.report.bank_ca_report',compact('ca_personal_info','ca_employment_info','ca_bank_info','file_info','get_photo','ca_personal_photo','ca_employment_photo'));
    }
}
