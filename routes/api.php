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
Route::get('/email/verify/{id}', 'API\VerificationController@verify')->name('verification.verify');
Route::get('/email/resend', 'API\VerificationController@resend')->name('verification.resend');
Route::post('/cadastro', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');

Route::apiResource('/tarefas', 'API\TasksController')->middleware('auth:api');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
