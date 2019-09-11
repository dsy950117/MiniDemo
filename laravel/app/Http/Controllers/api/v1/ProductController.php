<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Exceptions\ProductException;
class ProductController extends Controller
{
    public function getRecent(Request $request)
    {
        $count=$request->input('count');
        if (empty($count)){
            $count=15;
        }
        $products = Product::getMostRecent($count);
        if ($products->isEmpty()){
            throw new ProductException();
        }
        $products = $products->makeHidden(['summary'])->toArray();
        return $products;
    }

    public function getAllInCategory(Request $request)
    {
        $categoryID=$request->input('id');
        $products=Product::getProductsCategoryID($categoryID);
        if ($products->isEmpty()){
            throw new ProductException();
        }
        $products = $products->makeHidden(['summary'])->toArray();

        return $products;
    }
}
