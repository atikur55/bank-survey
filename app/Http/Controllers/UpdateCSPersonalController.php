<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssignSurvey;
use App\ParsonalDetails;
use App\EmployeeDetails;
use App\GuarantorDetails;
use App\BankStatement;
use App\CAPersonalDetails;
use Image;
use App\Ca_Multiple_photo;
use Auth;
use Carbon\Carbon;
use Redirect;
use App\CsPersonalPhoto;
use App\CsEmploymentPhoto;
use App\CsGuarantorPhoto;

class UpdateCSPersonalController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function update_assign_file($assign_id)
    {
        $notification_id = AssignSurvey::where('id',$assign_id)->update([
            'notification' => 1,
        ]);
    	$get_file_type = AssignSurvey::find($assign_id);

        if($get_file_type->file_type == 2)
        {
         $file_info = AssignSurvey::find($assign_id);
         $file_personal = ParsonalDetails::where('file_name',$file_info->filename)->first();
             if (empty($file_personal->file_name)) {
                if (Auth::user()->role == 1) {
                    return back()->with('failed','You Do not Create This File');
                } else {
                    return back()->with('failed','Your Admin Dont Create This File');
                }
                
                 // return back()->with('failed','Your Admin Dont Create This File');
             }
             else
             {
                return view('bank.update.cs.personal_details',compact('file_personal'));
             }
         // return view('bank.update.cs.personal_details',compact('file_personal'));
        }
        else
        {
         $file_info = AssignSurvey::find($assign_id);
         $file_personal_ca = CAPersonalDetails::where('file_name',$file_info->filename)->first();
            if (empty($file_personal_ca->file_name)) {
                 return back()->with('failed','Your Admin Dont Create This File');
             }
             else
             {
                return view('bank.update.ca.personal_details',compact('file_personal_ca'));
             }
         // return view('bank.update.ca.personal_details',compact('file_personal_ca'));
        }



    	// if($get_file_type->file_type == 2)
    	// {
    	// 	$file_info = AssignSurvey::find($assign_id);
    	// 	$file_personal = ParsonalDetails::where('file_name',$file_info->filename)->first();
    	// 	return view('bank.update.cs.personal_details',compact('file_personal'));
    	// }
    	// else
    	// {
    	// 	$file_info = AssignSurvey::find($assign_id);
    	// 	$file_personal_ca = CAPersonalDetails::where('file_name',$file_info->filename)->first();
    	// 	return view('bank.update.ca.personal_details',compact('file_personal_ca'));
    	// }
    }
    public function update_cs_personal_post(Request $request)
    {
    	$qr_code = time().rand(99,1000);
    	ParsonalDetails::where('file_name',$request->file_name)->update($request->except('_token') + [
            'user_id' => Auth::id(),
            'cs_qr_personal' => $qr_code,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        // Try Image Upload 
        $file_name_user = ParsonalDetails::where('file_name',$request->file_name)->first();
        $employee_info = EmployeeDetails::where('file_name',$request->file_name)->first();
        if (Auth::user()->role == 1) {
            if(empty($employee_info->file_name))
            {
               return Redirect::to('/assign_survey')->with('msg','You Dont Assign Employment File');
            }
            else
            {
               return view('bank.update.cs.employment_details',compact('employee_info')); 
            }
            
        }
        else
        {
            return view('bank.update.cs.photo.cs_personal_photo',compact('file_name_user'));
        }
        // return view('bank.update.cs.photo.cs_personal_photo',compact('file_name_user'));


        // End Image Upload
        // 
        // $file_name_user = $request->file_name;
        // $employee_info = EmployeeDetails::where('file_name',$request->file_name)->first();
        // if (empty($employee_info->file_name)) {
        //     return Redirect::to('/assign_list')->with('cs_pafailed','Employment File Name Not Found');
        // }
        // else
        // {

           
        //     return view('bank.update.cs.employment_details',compact('file_name_user','employee_info'));
           
        // }
        // End
        // return Redirect::to('/update_cs_employment_details')->with(compact('file_name_user'));
        // return view('bank.update.cs.employment_details',compact('file_name_user','employee_info'));
    }
    // CS personal photo Post
    public function cs_personal_photo_post(Request $request)
    {
        if(empty($request->cs_personal_photo))
        {
            // echo "pic nai";die();
            $employee_info = EmployeeDetails::where('file_name',$request->file_name)->first();
            if (empty($employee_info->file_name)) {
               return Redirect::to('/assign_list')->with('message','Survey Of Personal Details Successfully Complete But Image Not upload');
            } 
            else {
                return view('bank.update.cs.employment_details',compact('employee_info'));
            }
            
            // return Redirect::to('/assign_list')->with('message','Survey Of Personal Details Successfully Complete But Image Not upload');
        }
        else
        {
            $all_multiple_image = $request->file('cs_personal_photo');
            $flag = 1;
            foreach($all_multiple_image as $single_image)
            {
                $new_product_multiple_photo_name = $request->file_name.'-'.$flag.'.'.$single_image->extension();
                $new_product_photo_location = base_path('public/uploads/photo/cs/personal/'.$new_product_multiple_photo_name);
                Image::make($single_image)->resize(600,622)->save($new_product_photo_location);
                CsPersonalPhoto::insert([
                  'file_name' => $request->file_name,
                  'cs_personal_photo' => $new_product_multiple_photo_name,
                  'created_at' => Carbon::now(),
                ]);

                $flag++;

            }
            $employee_info = EmployeeDetails::where('file_name',$request->file_name)->first();
            if (empty($employee_info->file_name)) {  
            return Redirect::to('/assign_list')->with('cs_pafailed','Employment File Name Not Found');
            }
            else
            {
                // echo "file ase";
            return view('bank.update.cs.employment_details',compact('employee_info'));
               
            }

            // return Redirect::to('/assign_list')->with('message','Survey Successfully Complete');
        }
    }
    // End Personal Photo Post
    public function update_cs_employment_details()
    {
    	return view('bank.update.cs.employment_details');
    }
    public function update_cs_employment_post(Request $request)
    {
    	$qr_code = time().rand(99,1000);
    	EmployeeDetails::where('file_name',$request->file_name)->update($request->except('_token') + [
            'user_id' => Auth::id(),
            'qr_code_employee' => $qr_code,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        $file_name_user = EmployeeDetails::where('file_name',$request->file_name)->first();
        $guarantor_info = GuarantorDetails::where('file_name',$request->file_name)->first();
        if (Auth::user()->role == 1) {
            if(empty($guarantor_info->file_name))
            {
                return Redirect::to('/assign_survey')->with('msg','You Dont Assign Employment File');
            }
            else
            {
               return view('bank.update.cs.guarantor_details',compact('guarantor_info')); 
            }
            
        }
        else
        {
            return view('bank.update.cs.photo.cs_employment',compact('file_name_user'));
        }
        // return view('bank.update.cs.photo.cs_employment',compact('file_name_user'));


        // $file_name_user = $request->file_name;
        // $guarantor_info = GuarantorDetails::where('file_name',$request->file_name)->first();

        // if (empty($guarantor_info->file_name)) {
        //     return Redirect::to('/assign_list')->with('cs_gurfailed','Guarantor File Name Not Found');
        // }
        // else
        // {
        //     return view('bank.update.cs.guarantor_details',compact('file_name_user','guarantor_info'));
        // }

        // return view('bank.update.cs.guarantor_details',compact('file_name_user','guarantor_info'));
    }
    public function cs_employment_photo_post(Request $request)
    {
        if(empty($request->cs_employment_photo))
        {
            // echo "pic nai";die();
            $guarantor_info = GuarantorDetails::where('file_name',$request->file_name)->first();
            if (empty($guarantor_info->file_name)) {
               return Redirect::to('/assign_list')->with('message','Survey Of Personal Details Successfully Complete But Image Not upload');
            } 
            else {
                return view('bank.update.cs.guarantor_details',compact('guarantor_info'));
            }
            // return Redirect::to('/assign_list')->with('message','Survey Of Personal Details Successfully Complete But Image Not upload');
        }
        else
        {
            $all_multiple_image = $request->file('cs_employment_photo');
            $flag = 1;
            foreach($all_multiple_image as $single_image)
            {
                $new_product_multiple_photo_name = $request->file_name.'-'.$flag.'.'.$single_image->extension();
                $new_product_photo_location = base_path('public/uploads/photo/cs/employment/'.$new_product_multiple_photo_name);
                Image::make($single_image)->resize(600,622)->save($new_product_photo_location);
                CsEmploymentPhoto::insert([
                  'file_name' => $request->file_name,
                  'cs_employment_photo' => $new_product_multiple_photo_name,
                  'created_at' => Carbon::now(),
                ]);

                $flag++;

            }
        $guarantor_info = GuarantorDetails::where('file_name',$request->file_name)->first();

        if (empty($guarantor_info->file_name)) {
            return Redirect::to('/assign_list')->with('cs_gurfailed','Guarantor File Name Not Found');
        }
        else
        {
            return view('bank.update.cs.guarantor_details',compact('guarantor_info'));
        }

            // return Redirect::to('/assign_list')->with('message','Survey Successfully Complete');
        }
    }
    public function guarantor_details()
    {
    	return view('bank.update.cs.guarantor_details');
    }
    public function update_guarantor_details_post(Request $request)
    {
    	$qr_code = time().rand(99,1000);
    	GuarantorDetails::where('file_name',$request->file_name)->update($request->except('_token') + [
            'user_id' => Auth::id(),
            'qr_code_guarantor' => $qr_code,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        // $file_name_user = $request->file_name;
        $file_name_user = GuarantorDetails::where('file_name',$request->file_name)->first();
        $bank_statement_info = BankStatement::where('file_name',$request->file_name)->first();
        if (Auth::user()->role == 1) {
            if(empty($bank_statement_info->file_name))
            {
               return Redirect::to('/assign_survey')->with('msg','You Dont Assign Employment File');
            }
            else
            {
               return view('bank.update.cs.bank_statement',compact('bank_statement_info')); 
            }
            
        }
        else
        {
            return view('bank.update.cs.photo.cs_guarantor',compact('file_name_user'));
        }

        // return view('bank.update.cs.photo.cs_guarantor',compact('file_name_user'));

        // $bank_statement_info = BankStatement::where('file_name',$request->file_name)->first();

        // if (empty($bank_statement_info->file_name)) {
        //     return Redirect::to('/assign_list')->with('cs_banfailed','Bank Statement File Name Not Found');
        // }
        // else
        // {
        //     return view('bank.update.cs.bank_statement',compact('file_name_user','bank_statement_info'));
        // }

        // return view('bank.update.cs.bank_statement',compact('file_name_user','bank_statement_info'));
    }
    public function cs_guarantor_photo_post(Request $request)
    {
        if(empty($request->cs_guarantor_photo))
        {
            // echo "pic nai";die();
            $bank_statement_info = BankStatement::where('file_name',$request->file_name)->first();            
            if (empty($bank_statement_info->file_name)) {
               return Redirect::to('/assign_list')->with('message','Survey Of Personal Details Successfully Complete But Image Not upload');
            } 
            else {
                 return view('bank.update.cs.bank_statement',compact('bank_statement_info'));
            }
            // return Redirect::to('/assign_list')->with('message','Survey Of Personal Details Successfully Complete But Image Not upload');
        }
        else
        {
            $all_multiple_image = $request->file('cs_guarantor_photo');
            $flag = 1;
            foreach($all_multiple_image as $single_image)
            {
                $new_product_multiple_photo_name = $request->file_name.'-'.$flag.'.'.$single_image->extension();
                $new_product_photo_location = base_path('public/uploads/photo/cs/guarantor/'.$new_product_multiple_photo_name);
                Image::make($single_image)->resize(600,622)->save($new_product_photo_location);
                CsGuarantorPhoto::insert([
                  'file_name' => $request->file_name,
                  'cs_guarantor_photo' => $new_product_multiple_photo_name,
                  'created_at' => Carbon::now(),
                ]);

                $flag++;

            }
        $bank_statement_info = BankStatement::where('file_name',$request->file_name)->first();

        if (empty($bank_statement_info->file_name)) {
            return Redirect::to('/assign_list')->with('cs_banfailed','Bank Statement File Name Not Found');
        }
        else
        {
            return view('bank.update.cs.bank_statement',compact('bank_statement_info'));
        }
    }
}
    public function bank_statement_details()
    {
    	return view('bank.update.cs.bank_statement');
    }
    public function update_bank_statement_details_post(Request $request)
    {
    	$qr_code = time().rand(99,1000);
    	BankStatement::where('file_name',$request->file_name)->update($request->except('_token','statement_check') + [
            'user_id' => Auth::id(),
            'statement_check' => implode(',', (array) $request->get('statement_check')),
            'qr_code_statement' => $qr_code,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        $file = BankStatement::where('file_name',$request->file_name)->first();
        if(Auth::user()->role == 1)
        {
            return Redirect::to('/assign_survey');
        }
        else
        {
            return view('bank.update.cs.photo',compact('file'));
        }
        // return view('bank.update.cs.photo',compact('file'));

        // return Redirect::to('/assign_list')->with('message','Survey Successfully Complete');
       
    	
     
    }

    public function cs_photo_post(Request $request)
    {
        if(empty($request->cs_multiple_photo))
        {
            // echo "pic nai";die();
            return Redirect::to('/assign_list')->with('message','Survey Successfully Complete But Image Not upload');
        }
        else
        {
            $all_multiple_image = $request->file('cs_multiple_photo');
            $flag = 1;
            foreach($all_multiple_image as $single_image)
            {
                $new_product_multiple_photo_name = $request->file_name.'-'.$flag.'.'.$single_image->extension();
                $new_product_photo_location = base_path('public/uploads/cs_photo/multiple/'.$new_product_multiple_photo_name);
                Image::make($single_image)->resize(600,622)->save($new_product_photo_location);
                Ca_Multiple_photo::insert([
                  'file_name' => $request->file_name,
                  'cs_multiple_photo' => $new_product_multiple_photo_name,
                  'created_at' => Carbon::now(),
                ]);

                $flag++;

            }
            return Redirect::to('/assign_list')->with('message','Survey Successfully Complete');
        }
        // $all_multiple_image = $request->file('cs_multiple_photo');
        // $flag = 1;
        // foreach($all_multiple_image as $single_image)
        // {
        //     $new_product_multiple_photo_name = $request->file_name.'-'.$flag.'.'.$single_image->extension();
        //     $new_product_photo_location = base_path('public/uploads/cs_photo/multiple/'.$new_product_multiple_photo_name);
        //     Image::make($single_image)->resize(600,622)->save($new_product_photo_location);
        //     Ca_Multiple_photo::insert([
        //       'file_name' => $request->file_name,
        //       'cs_multiple_photo' => $new_product_multiple_photo_name,
        //       'created_at' => Carbon::now(),
        //     ]);

        //     $flag++;

        // }
       // return Redirect::to('/assign_list')->with('message','Survey Successfully Complete');
    }
}
