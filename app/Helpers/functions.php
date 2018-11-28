<?php

/**
 * 公用方法文件
 */

function api_return($code,$msg = '',$data = [],$headers = []){

    $content['code']   = $code;
    $content['msg']    = $msg;
    $content['data']   = $data;
    $content['time']   = request()->server('REQUEST_TIME');


    $data = \Illuminate\Http\Response::create($content,200,$headers);
    throw new \Illuminate\Http\Exceptions\HttpResponseException($data);
}

