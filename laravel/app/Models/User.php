<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends BaseModel
{
    public static function getByOpenID($openid)
    {

        $user=self::query()->where('openid','=',$openid)
            ->find($openid);
        return $user;
   }
}
