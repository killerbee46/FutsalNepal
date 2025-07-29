<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Futsal;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;




class UserController extends Controller
{
	//  public function __construct()
    // {
    // 	$this->middleware(function ($request, $next) {
    //     if (!Auth::user()->role == 3) {
    //     	dd("error");
    //         abort(404);
    //     }
    //         return $next($request);
    //     });
    // }
    public function index(Request $request){

        $data= User::paginate(5);
        return view('admin.user.userview',compact('data'));
	    //return view('userview', [‘users' => 'data']);
	    //return view('userview')
	            // ->with('users', 'data')
	            // ->with('name', 'value’')
	    //return view('userview', compact('data1','data2','data3'));
       }

    public function addUser()
    {
        return view('admin.user.addform');
    }

    public function addNewUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($file = $request->file('profile_pic')) {

            $request->validate([
                'profile_pic' =>'mimes:jpg,png,bmp,webp',
            ]);
            $image = $request->file('profile_pic');
            $imgExt = $image->getClientOriginalExtension();
            $fullname = time().".".$imgExt;
            $result = $image->storeAs('images/users',$fullname);

    }
    else{
        $fullname = "default.png";
    }


        $extUser = null;
        $extuser = User::where('email', $request->email)->first();

        if ($extuser) {
            $user = $extuser;
            if ($user->status == 3) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->mobile = $request->mobile;
                $user->role = $request->role;
                $user->status = $request->status;
                $user->profile_pic = $fullname;
                $user->password = Hash::make(12345678);

            }
            else{
                $this->validate($request, [
                    'email' => 'required|unique:users',
                ]);

            }

        }

        else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->role = $request->role;
            $user->profile_pic = $fullname;
            $user->longitude = $request->longitude;
            $user->latitude = $request->latitude;

            $user->password = Hash::make(12345678);

            $user->profile_pic = $fullname;

        }

        if ($user->save()) {

            return redirect('admin/users/')->with('success', 'New User Added Successfully');
        }

        return redirect('admin/users/')->with('errors', ['Sorry Some Error Occured.Please Try Again']);

    }



    public function editUser($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.user.editform', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]
        );
        $users = User::where('id', $id)->first();
        if ($file = $request->file('profile_pic')) {

            $request->validate([
                'profile_pic' =>'mimes:jpg,png,bmp,webp',
            ]);
            $image = $request->file('profile_pic');
            $imgExt = $image->getClientOriginalExtension();
            $fullname = time().".".$imgExt;
            $result = $image->storeAs('images/users',$fullname);

    }
    else{
        $fullname = $users->profile_pic;
    }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->profile_pic = $fullname;
        $user->status = $users->status;
        $user->longitude = $request->longitude;
        $user->latitude = $request->latitude;

        if ($user->save()) {

             return redirect('admin/users/')->with('success', 'User Updated Successfully.');
        }

        return redirect('admin/users/edit-user/' . $id)->with('errors', ['Sorry Some Error Occured.Please Try Again']);
    }


    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 3;
        $result = $user->save();

        $data= User::orderBy('id','desc')->where('status','<=',1)->get();
        if ($result) {
        	return view('admin.user.userview',compact('data'));
        }
    }

    public function searchuserForAdmin(Request $request){

        $searched=$request->searched;
        $data= User::orWhere('name','Like',"%$searched%")->orWhere('email','Like',"%$searched%")->orWhere('mobile','Like',"%$searched%")->get();
        return view('admin.user.searchuserview',compact('data','searched'));
    }

    public function AdminIndex()
    {
        $futsal = Futsal::all()->count();
        $booking = Booking::all()->count();
        $user = User::all()->count();
        $latest = Booking::orderBy("id","DESC")->paginate(7);
        return view('admin.index',compact('futsal','booking','user','latest'));
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function changeStatus($id,$status){
        $user = User::findOrFail($id);

        $user->status = $status;
        $user->save();

        if($user->save()){
            return redirect('/admin/users',)->with('success', `User $status Successfully.`);
        }
        else{
            return redirect('/admin/users',)->with('error', `Could not $status user.`);
        }
    }
    public function penalty()
    {
        $users = DB::select('select * from users where penalty > ?', [0]);
        return view('admin.penalty',compact('users'));
    }
    public function penaltyClear(Request $request)
    {
        $user = User::findorfail($request->userId);

        $user->penalty = $user->penalty - $request->paidAmount;
        if($user->penalty <= 0){
            $user->status = "approved";
        }
        else{
            $user->status = $user->status;
        }
        if ($user->save()) {
            return redirect('admin/penalty')->with('status', "Entered amount has been deducted from user's penalty");
        }
        else{
            return redirect('admin/penalty')->with('status', "Could not carry out transaction");
        }
    }
}

