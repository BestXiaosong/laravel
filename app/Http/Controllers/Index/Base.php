<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6/006
 * Time: 22:12
 */

namespace App\Http\Controllers\Index;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

class Base extends Controller
{

    const __PUBLIC__ = 'admin';



    public function index()
    {
        echo 'this is index';exit;
        return view('admin/public/index');
    }
}