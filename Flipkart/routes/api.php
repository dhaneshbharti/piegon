<?php

use Illuminate\Http\Request;
use App\Http\Controllers\FlipkartController;
// use App\Http\Controllers\RegistrationController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/dhanesh',[FlipkartController::class,'role']);
Route::get('/dhaneshji/{id}',[FlipkartController::class,'worker']);
Route::post('/product/create',[FlipkartController::class,'create']);

//ye api hain jo data ko fetch krti hai UI ke liye right front end me