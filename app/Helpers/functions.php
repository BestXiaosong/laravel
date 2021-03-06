<?php

/**
 * 公用方法文件
 */

function api_return($code,$msg = '',$data = [],$headers = []){

    $content['code']   = $code;
    $content['msg']    = $msg;
    $content['data']   = $data;
    $content['time']   = request()->server('REQUEST_TIME');

    $response = \Illuminate\Http\Response::create($content,200,$headers);

    throw new \Illuminate\Http\Exceptions\HttpResponseException($response);
}

/**
 * Created by xiaosong
 * E-mail:4155433@gmail.com
 * 手动拦截异常返回
 */
function error_exception($code,$msg = '',$data = [],$headers = []){
    $content['code']   = $code;
    $content['msg']    = $msg;
    $content['data']   = $data;
    $content['time']   = request()->server('REQUEST_TIME');

    $response = \Illuminate\Http\Response::create($content,200,$headers);
    return $response;
}



