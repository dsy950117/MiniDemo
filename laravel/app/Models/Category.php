<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    protected  $table='category';
    protected $hidden=['delete_time','update_time','create_time'];
    public function img()
    {
        return $this->belongsTo('App\Models\Image','topic_img_id','id');
   }
}
