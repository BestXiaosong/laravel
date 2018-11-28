<?php

namespace App\Http\Controllers\Admin;



class Index extends Base
{
    public function __construct()
    {

    }


    public function index()
    {

        dd(session('userInfo'));

        
    }
    
    
}
