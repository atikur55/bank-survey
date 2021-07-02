<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enquiry;
use Carbon\Carbon;

class ClientEnquiryController extends Controller
{
    public function create()
    {
    	return view('client.enquiry');
    }
    public function sent_enquiry(Request $request)
    {
    	$request->validate([
    		'name' => 'required',
    		'website' => 'required',
    		'company' => 'required',
    		'email' => 'required|email',
    		'phone' => 'required|regex:/(01)[0-9]{9}/',
    		'notes' => 'required',
    		'address' => 'required',
    		'date' => 'required',
    		'priority' => 'required',
    	]);
    	Enquiry::insert([
    		'name' => $request->name,
    		'website' => $request->website,
    		'company' => $request->company,
    		'email' => $request->email,
    		'phone' => $request->phone,
    		'notes' => $request->notes,
    		'address' => $request->address,
    		'date' => $request->date,
    		'priority' => $request->priority,
    		'created_at' => Carbon::now(),
    	]);
    	return back()->with('success','Your Information Send Successfully');
    }
    public function view_enquiry()
    {
    	$enquiries = Enquiry::orderBy('id','desc')->get();
    	return view('client.view',compact('enquiries'));
    }
    public function delete_enquiry($enquiry_id)
    {
        Enquiry::find($enquiry_id)->delete();
        return back()->with('delete','Enquiry Data Delete Successfully');
    }
}
