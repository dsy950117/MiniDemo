<?php


namespace App\Http\Controllers\api\v1;

use App\Exceptions\BannerMissException;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Factory\make;
use think\Exception;
use Validator;
use App\Http\Models\BannerItem;

class BannerController extends Controller
{
    /**
     * 获取指定id的banner信息
     * @URL /banner/{id}
     * @http GET
     * @id banner的id号
     */
    public function getBanner($id)
    {
//        $banner =new Banner();
//    $banner=Banner::with(['BannerItem','BannerItem.img'])->find($id);
    $banner=Banner::getBannerByID($id);
        if ($banner->isEmpty()) {
            throw new BannerMissException();
        }
        return $banner;
    }
}