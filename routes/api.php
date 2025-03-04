<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/data', 'JsonController@getData');
// Route::post('/data', 'JsonController@postData');
// Route::put('/data/{id}', 'JsonController@updateData');
// Route::delete('/data/{id}', 'JsonController@deleteData');

Route::get('/doctors', 'DoctorsController@getData');
Route::post('/doctors', 'DoctorsController@postData');
Route::put('/doctors/{id}', 'DoctorsController@updateData');
Route::delete('/doctors/{id}', 'DoctorsController@deleteData');
