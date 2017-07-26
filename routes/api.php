<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
//----------------------------  igredient ---------------------------------------
Route::resource('ingredient','IngredientController',[
    //'middleware' => 'jwt.aut'
]);

Route::post('ingredient/{id}','IngredientController@store',[
    //'middleware' => 'jwt.aut'
]);

Route::get('ingredient/{id}','IngredientController@show',[
    //'middleware' => 'jwt.aut'
]);
Route::put('ingredient/{id}/{TypeId}','IngredientController@update',[
    //'middleware' => 'jwt.aut'
]);
Route::put('ingredient/{id}','IngredientController@update',[
    //'middleware' => 'jwt.aut'
]);
//-------------------------------------------------------------------------------


Route::resource('menu','MenuController',[
    //'middleware' => 'jwt.aut'
]);

Route::resource('image','ImageController');

Route::resource('ingredient_type','IngredientTypeController');
Route::resource('ingredient_type/{id}','IngredientTypeController@show');

/*Route::GET('material/{id}','MaterialController@showById',[
    'middleware' => 'jwt.auth'
]);*/








