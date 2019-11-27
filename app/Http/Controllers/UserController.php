<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $saltword;

    public function __construct()
    {
        $this->saltword = 'test';
    }

    public function test(Request $request)
    {

        $password = $request->input('password', '123456');

        echo '密碼明文:'.$password."<br>";

//        $mysalt = $this->gensalt();
        $mysalt = '$2y$10$w/WxpDOhYL30u36X1tqjM.tA3xlMh/WJkam0VRV48ZTMJBUB37RhW';

        echo '加鹽: '.$mysalt."<br>";

        $ciphertext = $this->encryptMd5($mysalt,$password);

        echo '密碼密文: '.$ciphertext;

    }

    private function gensalt()
    {
        $salt = Hash::make($this->saltword);

        return $salt;
    }

    private function encryptMd5($salt,$passwd)
    {
        return md5($salt.$passwd);
    }
}
