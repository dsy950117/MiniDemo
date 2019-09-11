<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerItem extends BaseModel
{
    protected $table = 'banneritem';
    protected $hidden=['id','img_id','banner_id','update_time','delete_time'];
    public function img()
    {
        return $this->belongsTo('App\Models\Image','img_id','id');
    }
}
