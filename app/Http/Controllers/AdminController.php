<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    use AuthenticatesUsers;

//    protected $redirectTo = '/admin/home';
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest:admin');
//         $this->middleware('auth');
    }


    public function showLoginForm(Request $request)
    {
        return view('admin.login');
    }

    public function showDashboad(Request $request)
    {
        return view('admin.admin');
    }

    public function login(Request $request)
    {
        //auth('admin') 你自定义的grude  attempt(['要验证的字段'=>'发送过来的值'])
        $res = auth('admin')->attempt(['name' => $request->get('name'), 'password' => $request->get('password')]);

        if ($res) {
            return redirect('admin/home');
        } else {
            return redirect('admin/login');
        }
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect('admin/login');
    }





}
