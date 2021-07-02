<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\AppInfo;
use Auth;
use Illuminate\Support\Facades\Hash;

class LoginApiController extends Controller
{
    public function index(Request $request)
    {

	    	$password = $request->password;
	    	$email = $request->email;
			  if ( Auth::attempt(['email' => $email, 'password' => $password])) {

				$result =User::where('email',$request->email)
		    	->first();
          // Add AppInfo Table
          $get_app = AppInfo::where('status',1)->first();
          // End AppInfo
			   	$d = array();
    		    $d = [
	    			'status'=>'Logged in successfully',
	    			'name'=>$result->name,
	    			'email'=>$result->email,
	    			'id'=>$result->id,
		            'app_name' => $get_app->app_name,
		            'app_logo' => $get_app->app_logo,
	    		];
	    		return response()->json($d, 200);
				}else{
	    			$d = array();
	    		$d = [
	    			'status'=>'Wrong Username or Password'
	    		];
	    		return response()->json($d, 200);
    			}

	}
	  public function logout()
    {
		$d = array();
    	$d = [
    		'status'=>'Logout successfully'
    	];
    	return response()->json($d, 200);
    }

}
