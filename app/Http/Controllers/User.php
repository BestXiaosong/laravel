<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    //
    public function index()
    {
        public_path();
        return view('user/user');
    }
}
