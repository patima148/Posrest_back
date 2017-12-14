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

Route::post('ingredient','IngredientController@store',[
    //'middleware' => 'jwt.aut'
]);

Route::get('ingredient/{id}','IngredientController@show',[
    //'middleware' => 'jwt.aut'
]);
Route::put('ingredient/{id}/{branch_id}','IngredientController@update',[
    //'middleware' => 'jwt.aut'
]);
//-------------------------------------------------------------------------------//

Route::resource('menu','MenuController',[
    //'middleware' => 'jwt.aut'
]);

Route::post('menu', 'MenuController@store');
//Route::post('menu/{id}', 'MenuController@store');

Route::resource('image','ImageController');

Route::get('branch/ingredient/{branchId}', 'BranchController@showBranchWithIngredient');
Route::get('user/id/{id}','UserController@show');
Route::get('user/name/{name}','UserController@showByName');
Route::resource('user', 'UserController');
Route::post('user', 'UserController@store');
Route::put('user/{id}', 'UserController@update');
Route::post('add/branch', 'BranchController@store');
Route::resource('branch', 'BranchController');
Route::get('branch/{id}', 'BranchController@getById');
Route::post('add/menu', 'MenuController@store');
Route::put('branch/{id}', 'BranchController@update');

//------------     Clocking     -------------------------------------------------//
//Clock-in
Route::post('clock-in','ClockInController@store');
//Clock-out
Route::post('clock-out','ClockOutController@store');
//GetAllClocking
Route::resource('clocking','ClockingController');
Route::get('clocking/{user}','ClockingController@show');
Route::post('payment','PaymentController@store');
Route::put('clock-out/{user_id}','ClockingController@update');

//Route::resource('Qoutes','QoutesController');
Route::resource('order','OrderController');

Route::post('order','OrderController@store');

Route::resource('orderdetail','OrderdetailController');

Route::resource('profiling','PartTimeProfileController');
Route::get('profiling/{userId}','PartTimeProfileController@show');

Route::post('brewing','BrewingController@store');
Route::put('brewing/{id}','BrewingController@update');
Route::resource('brewing','BrewingController');

Route::resource('report','ReportController');
Route::get('report/{key}/{userId}/{day}/{shift}','ReportController@show');

Route::get('workforce/{day}/{shift}','WorkforceController@show');