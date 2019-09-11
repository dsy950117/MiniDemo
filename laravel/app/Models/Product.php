<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    protected $table='product';

    protected $hidden=['update_time','delete_time','main_img_id','pivot','from',
        'category_id','create_time'];

    public function getMainImgUrlAttribute($value)
    {
        return $this->prefixImgUrl($value);
    }

    public static function getMostRecent($count){

        $products=self::query()->take($count)->orderBy('create_time','desc')->get();
        return $products;
    }

    public static function getProductsCategoryID($categoryID){
        $products=self::query()->where('category_id','=',$categoryID)->get();
        return $products;
    }
}
