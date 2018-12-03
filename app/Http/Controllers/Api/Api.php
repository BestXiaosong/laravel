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
        $results = \App\Models\model\Users::paginate(2)   ;

        foreach ($results as $k => $v){
            $results[$k]['user_id'] = md5($v['user_id']);

        }

//        $rows =   Test::collection($results);
//        dd($rows);


//        dd($results->links());
        api_return(1,'获取成功',$results->toArray());
//        dd();

    }

}