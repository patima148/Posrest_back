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
Route::put('ingredient/{id}/{branch_id}','IngredientController@update',[
    //'middleware' => 'jwt.aut'
]);
//-------------------------------------------------------------------------------

Route::resource('menu','MenuController',[
    //'middleware' => 'jwt.aut'
]);

Route::resource('image','ImageController');

Route::get('user/id/{id}','UserController@show');
Route::get('user/name/{name}','UserController@showByName');
Route::resource('user', 'UserController');
Route::post('user', 'UserController@store');
Route::put('user/id', 'UserController@update');
Route::post('add/branch', 'BranchController@store');
Route::resource('branch', 'BranchController');
Route::get('branch/{id}', 'BranchController@getById');

Route::post('add/menu', 'MenuController@store');










