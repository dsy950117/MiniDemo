<?php

namespace App\Http\Controllers\api\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function getBanner($id){
        return 'this is v2 version';
    }
}
