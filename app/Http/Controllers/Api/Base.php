<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6/006
 * Time: 22:13
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;

class Base extends Controller
{


    public function index(){


        return $this->message('请求成功');

    }


}