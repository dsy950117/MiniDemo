<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected function prefixImgUrl($value)
    {
//        var_dump($this->attributes);die;
        $finalUrl=$value;
        if (($this->attributes['from'])==1){
            $finalUrl= config('setting.img_prefix').$value;
        }
        return $finalUrl;
    }
}
