<?php

namespace App\Models\model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    static public function getOne()
    {
        return self::first()->toArray();

    }


}
