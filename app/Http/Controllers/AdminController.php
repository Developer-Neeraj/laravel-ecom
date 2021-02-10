<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('admin_login')) {
            return redirect("admin/dashboard");
        } else {
            return view('admin.login');
        }
        return view("admin.login");
    }

    public function auth(Request $request)
    {
        $mail = $request->post('email');
        $password = $request->post('password');
        // $result = Admin::where(['email'=>$mail, 'password'=>$password])->get();
        $result = Admin::where(['email'=>$mail])->first();
        if($result) {
            if(hash::check($request->post('password'), $result->password)) {
                $request->session()->put("admin_login", true);
                $request->session()->put("Login_id", $result->id);
                return redirect('admin/dashboard');
            } else {
                $request->session()->flash("error", "Please Enter Correct Password");
                return redirect('admin');
            }
        } else {
            $request->session()->flash("error", "Please Enter Valid Details");
            return redirect('admin');
        }
    }

    public function dashboard() {
        return(view('admin.dashboard'));
    }
}
