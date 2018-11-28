<?php

namespace App\Models\model;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{

    public function Login($data)
    {
        $res = $this->where('user_name',$data['user_name'])->select('user_id','user_name','password')->first();
        if (!$res){
            return '账号不存在';
        }else{
            $row = $res->toArray();
        }
        if (empty($row)) return '账号不存在';
        if ($row['password'] != md5($data['password'].'tz')) return '账号或密码错误';
        return true;
    }
}
