<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CAPersonalDetails;
use App\CAEmploymentDetails;
use App\CABankStatement;
use App\Caphoto;
use Image;
use Auth;
use Carbon\Carbon;
use Redirect;
use App\CaPersonalPhoto;
use App\CaEmploymentPhoto;

class UpdateCAController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function update_personal_ca_post(Request $request)
    {
    	$qr_code = time().rand(99,1000);
    	CAPersonalDetails::where('file_name',$request->file_name)->update($request->except('_token') + [
            'user_id' => Auth::id(),
            'ca_qr_per_code' => $qr_code,
            'created_at' => Carbon::now(),
        ]);
        // $file_name_user = $request->file_name;
        // $ac_employee_info = CAEmploymentDetails::where('file_name',$request->file_name)->first();
        $file_name_user = CAPersonalDetails::where('file_name',$request->file_name)->first();
        $ac_employee_info = CAEmploymentDetails::where('file_name',$request->file_name)->first();
        if (Auth::user()->role == 1) 
        {
          if (empty($ac_employee_info->file_name)) {
            return Redirect::to('/assign_survey')->with('msg','You Dont Assign Employment File');
          } else {
            return view('bank.update.ca.employment_details',compact('file_name_user','ac_employee_info'));
          }     
        } 
        else {
          return view('bank.update.ca.photo.ca_personal_photo',compact('file_name_user'));
        }
        
        // return view('bank.update.ca.photo.ca_personal_photo',compact('file_name_user'));

        // if(empty($ac_employee_info->file_name))
        // {
        //   return back()->with('failed','Employment File Name Not Found');
        // }
        // else
        // {
        //   return view('bank.update.ca.employment_details',compact('file_name_user','ac_employee_info'));
        // }


        // return view('bank.update.ca.employment_details',compact('file_name_user','ac_employee_info'));
    }
    public function ca_personal_photo_post(Request $request)
    {
      if(empty($request->ca_personal_photo))
        {
          $ac_employee_info = CAEmploymentDetails::where('file_name',$request->file_name)->first();
          if(empty($ac_employee_info->file_name))
          {
            return Redirect::to('/assign_list')->with('message','Survey Successfully Complete But You have not Upload Image');
            // return back()->with('failed','Employment File Name Not Found');
          }
          else
          {
            return view('bank.update.ca.employment_details',compact('ac_employee_info'));
          }
          // return Redirect::to('/assign_list')->with('message','Survey Successfully Complete But You have not Upload Image');
     
        }
        else
        {
             $all_multiple_image = $request->file('ca_personal_photo');
            $flag = 1;
            foreach($all_multiple_image as $single_image)
            {
                $new_product_multiple_photo_name = $request->file_name.'-'.$flag.'.'.$single_image->extension();
                $new_product_photo_location = base_path('public/uploads/photo/ca/personal/'.$new_product_multiple_photo_name);
                Image::make($single_image)->resize(600,622)->save($new_product_photo_location);
                CaPersonalPhoto::insert([
                  'file_name' => $request->file_name,
                  'ca_personal_photo' => $new_product_multiple_photo_name,
                  'created_at' => Carbon::now(),
                ]);

                $flag++;

            }
          $ac_employee_info = CAEmploymentDetails::where('file_name',$request->file_name)->first();
          if(empty($ac_employee_info->file_name))
          {
            return Redirect::to('/assign_list')->with('message','Survey Successfully Complete');
            // return back()->with('failed','Employment File Name Not Found');
          }
          else
          {
            return view('bank.update.ca.employment_details',compact('ac_employee_info'));
          }
           // return Redirect::to('/assign_list')->with('message','Survey Successfully Complete');
        }
    }
    public function update_employment_cs()
    {
    	return view('bank.update.ca.employment_details');
    }
    public function update_employment_ca_post(Request $request)
    {
    	$qr_code = time().rand(99,1000);
    	CAEmploymentDetails::where('file_name',$request->file_name)->update($request->except('_token') + [
            'user_id' => Auth::id(),
            'ca_qr_employment' => $qr_code,
            'created_at' => Carbon::now(),
        ]);
        $file_name_user = $request->file_name;
        // $ca_bank_info = CABankStatement::where('file_name',$request->file_name)->first();
        $file_name_user = CAEmploymentDetails::where('file_name',$request->file_name)->first();
        $ca_bank_info = CABankStatement::where('file_name',$request->file_name)->first();
        if (Auth::user()->role == 1) 
        {
          if (empty($ca_bank_info->file_name)) {
            return Redirect::to('/assign_survey')->with('msg','You Dont Assign Bank Statement File');
          } else {
             return view('bank.update.ca.bank_statement',compact('file_name_user','ca_bank_info'));
          }
          
        } 
        else {
          return view('bank.update.ca.photo.ca_employment_photo',compact('file_name_user'));
        }

        // return view('bank.update.ca.photo.ca_employment_photo',compact('file_name_user'));

        // if(empty($ca_bank_info->file_name))
        // {
        //   // return back()->with('failed','Bank Statement File Name Not Found');
        //   return Redirect::to('/assign_list')->with('failed_bank','Bank Statement File Name Not Found');
        // }
        // else
        // {
        //   return view('bank.update.ca.bank_statement',compact('file_name_user','ca_bank_info'));
        // }

        // return view('bank.update.ca.bank_statement',compact('file_name_user','ca_bank_info'));
    }
    public function ca_employment_photo_post(Request $request)
    {
      if(empty($request->ca_employment_photo))
        {
          $ca_bank_info = CABankStatement::where('file_name',$request->file_name)->first();
          if (empty($ca_bank_info->file_name)) {
            return Redirect::to('/assign_list')->with('failed_bank','Bank Statement File Name Not Found');
          }
          else
          {
            return view('bank.update.ca.bank_statement',compact('ca_bank_info'));
          }
          // return Redirect::to('/assign_list')->with('message','Survey Successfully Complete But You have not Upload Image');
     
        }
        else
        {
             $all_multiple_image = $request->file('ca_employment_photo');
            $flag = 1;
            foreach($all_multiple_image as $single_image)
            {
                $new_product_multiple_photo_name = $request->file_name.'-'.$flag.'.'.$single_image->extension();
                $new_product_photo_location = base_path('public/uploads/photo/ca/employment/'.$new_product_multiple_photo_name);
                Image::make($single_image)->resize(600,622)->save($new_product_photo_location);
                CaEmploymentPhoto::insert([
                  'file_name' => $request->file_name,
                  'ca_employment_photo' => $new_product_multiple_photo_name,
                  'created_at' => Carbon::now(),
                ]);

                $flag++;

            }
          $ca_bank_info = CABankStatement::where('file_name',$request->file_name)->first();
          if(empty($ca_bank_info->file_name))
          {
            return Redirect::to('/assign_list')->with('message','Survey Successfully Complete');
            // return back()->with('failed','Employment File Name Not Found');
          }
          else
          {
            return view('bank.update.ca.bank_statement',compact('ca_bank_info'));
          }
           // return Redirect::to('/assign_list')->with('message','Survey Successfully Complete');
        }
    }
    public function update_bank_statement_ca_post(Request $request)
    {
      // $request->validate([
      //   'ca_check_verify' => 'required',
      // ]);

    	$qr_code = time().rand(99,1000);
    	CABankStatement::where('file_name',$request->file_name)->update($request->except('_token','ca_check_verify') + [
            'user_id' => Auth::id(),
            'ca_check_verify' => implode(',', (array) $request->get('ca_check_verify')),
            'ca_qr_bank' => $qr_code,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        $file = CABankStatement::where('file_name',$request->file_name)->first();
        if (Auth::user()->role == 1) {
          return Redirect::to('/assign_survey');  
        } else {
          return view('bank.update.ca.photo',compact('file'));
        }
        
        // return view('bank.update.ca.photo',compact('file'));
        // return Redirect::to('/assign_list')->with('message','Survey Successfully Complete');
    }
    public function ca_photo_post(Request $request)
    {
        if(empty($request->ca_multiple_photo))
        {
           return Redirect::to('/assign_list')->with('message','Survey Successfully Complete But You have not Upload Image');
     
        }
        else
        {
             $all_multiple_image = $request->file('ca_multiple_photo');
            $flag = 1;
            foreach($all_multiple_image as $single_image)
            {
                $new_product_multiple_photo_name = $request->file_name.'-'.$flag.'.'.$single_image->extension();
                $new_product_photo_location = base_path('public/uploads/ca_photo/multiple/'.$new_product_multiple_photo_name);
                Image::make($single_image)->resize(600,622)->save($new_product_photo_location);
                Caphoto::insert([
                  'file_name' => $request->file_name,
                  'ca_multiple_photo' => $new_product_multiple_photo_name,
                  'created_at' => Carbon::now(),
                ]);

                $flag++;

            }
           return Redirect::to('/assign_list')->with('message','Survey Successfully Complete');
        }
       //  $all_multiple_image = $request->file('ca_multiple_photo');
       //  $flag = 1;
       //  foreach($all_multiple_image as $single_image)
       //  {
       //      $new_product_multiple_photo_name = $request->file_name.'-'.$flag.'.'.$single_image->extension();
       //      $new_product_photo_location = base_path('public/uploads/ca_photo/multiple/'.$new_product_multiple_photo_name);
       //      Image::make($single_image)->resize(600,622)->save($new_product_photo_location);
       //      Caphoto::insert([
       //        'file_name' => $request->file_name,
       //        'ca_multiple_photo' => $new_product_multiple_photo_name,
       //        'created_at' => Carbon::now(),
       //      ]);

       //      $flag++;

       //  }
       // return Redirect::to('/assign_list')->with('message','Survey Successfully Complete');
    }
}
