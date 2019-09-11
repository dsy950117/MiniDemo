<?php

namespace App\Http\Controllers\api\v1;

use App\Exceptions\CategoryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getAllCategories()
    {
        $categories=Category::with(['img'])->get();
        if ($categories->isEmpty()){
            throw  new CategoryException();
        }
        return $categories;
    }
}
