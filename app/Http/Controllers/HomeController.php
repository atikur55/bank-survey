<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\GiveAnswer;
use App\Answer;
use App\AssignSurvey;;
use App\User;
use Carbon\Carbon;
use Redirect;
use Auth;
use Hash;
use App\AppInfo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $get_questions = Question::orderBy('id','asc')->where('status',1)->paginate(15);
        $get_answer = GiveAnswer::all();
        $total_users = User::where('role',0)->count();
        $total_question = Question::count();
        $total_answers = Answer::count();
        $get_user = Auth::user();
        $get_logo = AppInfo::where('status',1)->first();
        $total_complete_file = AssignSurvey::where('task_status',1)->count();
        $total_incomplete_file = AssignSurvey::where('task_status',0)->count();
        return view('dashboard',compact('get_questions','get_answer','total_users','total_question','total_answers','get_user','get_logo','total_complete_file','total_incomplete_file'));
    }

    public function home()
    {
        $get_questions = Question::orderBy('id','asc')->where('status',1)->paginate(15);
        $get_answer = GiveAnswer::all();
        $total_users = User::where('role',0)->count();
        $total_question = Question::count();
        $total_answers = Answer::count();
        $get_user = Auth::user();
        $get_logo = AppInfo::where('status',1)->first();
        $total_complete_file = AssignSurvey::where('task_status',1)->count();
        $total_incomplete_file = AssignSurvey::where('task_status',0)->count();
        return view('dashboard',compact('get_questions','get_answer','total_users','total_question','total_answers','get_user','get_logo','total_complete_file','total_incomplete_file'));
    }
    public function users()
    {
        $all_users = User::where('role',0)->orderBy('id','asc')->get();
        return view('admin.users.all_users',compact('all_users'));
    }
    public function banks()
    {
        $all_banks = User::where('role',2)->orderBy('id','asc')->get();
        return view('admin.users.banks',compact('all_banks'));
    }
    public function admin()
    {
        $all_admin = User::where('role',1)->orderBy('id','asc')->get();
        return view('admin.users.admin',compact('all_admin'));
    }
    public function user_delete($user_id)
    {
       User::find($user_id)->delete();
       return back()->with('delete_success','User Delete Successfully');
    }
    public function user_edit($user_id)
    {
        $get_user = User::find($user_id);
        return view('admin.users.edit',compact('get_user'));
    }
    public function edit_user_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ],[
            'name.required' => 'Enter User Name',
            'email.required' => 'Enter User Email',
        ]);
        User::where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'created_at' => Carbon::now(),
        ]);
        return Redirect::to('users')->with('edit_successs', 'User Information Update Successfully');
    }
    public function editprofile()
    {
        return view('admin.profile.editprofile');
    }
    public function editprofilepost(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ],[
            'old_password.required' => 'Please field your old password',
            'password.required' => 'Enter your new password',
            'password_confirmation.required' => 'Enter your confirm password',
        ]);
          $old_password = $request->old_password;
          $db_password = Auth::user()->password;
          if (Hash::check($old_password,$db_password)) {
            User::find(Auth::id())->update([
              'password' => Hash::make($request->password),
            ]);
            return back()->with('editsuccess','Password update Successfully');
          } else {
            return back()->with('editerror','Password does not match!');
          }
    }
}