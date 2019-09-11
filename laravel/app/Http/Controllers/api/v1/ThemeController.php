<?php

namespace App\Http\Controllers\api\v1;

use App\Exceptions\ThemeException;
use App\Models\Theme;
use App\validate\IDMustBePositiveInt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class ThemeController extends Controller
{
    /**
     * @param Request $request
     * @param string $ids
     * @return Theme[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getSimpleList(Request $request)
    {
        $ids=$request->input();
        $ids=explode(',',$ids['ids']);
        $result = Theme::with('topicImg', 'headImg')->whereIn('id',$ids)->get();
        if ($result->isEmpty()){
            throw new ThemeException();
        }
        return $result;
    }

    public function getComplexOne($id)
    {
        $theme=Theme::getThemeWithProducts($id);
        if (!$theme){
            throw new ThemeException();
        }
        return $theme;
    }
}
