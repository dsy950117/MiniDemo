<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends BaseModel
{
    protected $table = 'banner';
    protected $hidden = ['update_time','delete_time'];

    public function BannerItem()
    {
         return  $this->hasMany('App\Models\BannerItem','banner_id','id');
    }

    public static function getBannerByID($id)
    {
        $banner=self::with(['BannerItem','BannerItem.img'])->find($id);
        return $banner;

    }

}
