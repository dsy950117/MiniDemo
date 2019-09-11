<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});

//404
Route::get('/404',function (){
    return abort(404);
});


Route::namespace('api\v1')->group(function ($id){
    Route::get('api/v1/banner/{id}','BannerController@getBanner');
    Route::get('api/v1/theme','ThemeController@getSimpleList');
    Route::get('api/v1/themes/{id}','ThemeController@getComplexOne');
    Route::get('api/v1/product/recent','ProductController@getRecent');
    Route::get('api/v1/product/by_category','ProductController@getAllInCategory');
    Route::get('api/v1/category/all','CategoryController@getAllCategories');
    Route::post('api/v1/token/user','TokenController@getToken');

});
Route::namespace('api\v2')->group(function ($id){
    Route::get('api/v2/banner/{id}','BannerController@getBanner');

});