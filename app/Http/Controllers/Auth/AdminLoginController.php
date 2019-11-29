<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginform()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
       $this->validate($request,[
            'email' => 'required | email',
            'password' => 'required | min:6'
       ]);

       $exam =  Auth::guard('admin')->attempt([
           'email'=>$request->email,
           'password'=>$request->password,
       ] ,$request->remember);


       if($exam){
           return redirect()->intended(route('admin.home'));
       }

       return redirect()->back()->withInput($request->only('email','remember'));
    }
}
