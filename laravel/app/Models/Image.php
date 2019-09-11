<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends BaseModel
{
    protected $table = 'image';
    protected $hidden=['id','from','delete_time','update_time'];

    public function getUrlAttribute($value)
    {
        return $this->prefixImgUrl($value);
    }
}
