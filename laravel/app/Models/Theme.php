<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Theme extends BaseModel
{
    protected $table='theme';
    protected $hidden=['topic_img_id','head_img_id','update_time','delete_time'];
    public function topicImg()
    {
        return $this->belongsTo('App\Models\Image','topic_img_id','id');
   }

    public function headImg()
    {
        return $this->belongsTo('App\Models\Image','head_img_id','id');
   }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product','theme_product','theme_id','product_id');
   }

   public static function getThemeWithProducts($id){
        $theme=self::with(['products','topicImg','headImg'])->findMany($id);
        return $theme;
   }

}
