<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
class Admincontroller extends Controller
{
    //

    public function index(){
        return view('backend.admin.admin_login');
    }

    public function adminlogin(Request $request){

        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        // dd($request);
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('admindashboard');
        
        }else{
  
           Session::flash('error-msg','invalid');
        }
        //return view('backend.dashboard.admin_dashboard');
    }
    public function admindashboard(){
        return view('backend.dashboard.admin_dashboard');
    }
    public function adminlogout(){
        Auth::guard('admin')->logout();
        return redirect('admin_login');
    }
}
