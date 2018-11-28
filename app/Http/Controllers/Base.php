<?php

namespace App\Http\Controllers;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class Base extends Controller
{
    function api_return($code,$msg,$data = [],$header = [])
    {
        $content['code'] = $code;
        $content['msg']  = $msg;
        $content['data'] = $data;
        $content['time'] = \request()->server('REQUEST_TIME');

        return response()->json($content);
    }
}

