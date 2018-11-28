<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/28/028
 * Time: 20:23
 */

namespace App\Http\Controllers\Api;


use App\Http\Resources\Test;
use App\Http\Resources\Users;
use Illuminate\Http\Response;

class Api extends Base
{


    public function index()
    {

//        return Response::create('错误',400);


//        $data = \App\Models\model\Users::getOne();
//
//        return Test::collection(\App\Models\model\Users::paginate(1));
//
////        dd($data);
//            return   (new Users)->toArray($data);
        $mode = \App\Models\model\Users::find();
        $rows =  Test::collection($mode);

//        dd();

        return $this->success($rows);
    }

}