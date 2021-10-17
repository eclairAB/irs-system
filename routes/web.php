<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\QueriesController;
use App\Http\Controllers\PostsController;
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
    return redirect()->route('voyager.login');
});

Route::group(['prefix' => 'admin'], function () {
    require __DIR__.'/voyager.php';

    Route::get('/{role}', [ViewsController::class, "roleView"]);
    Route::get('/container/classes',[QueriesController::class,"getContainterClass"]);
    Route::get('/container/heights',[QueriesController::class,"getContainterHeight"]);
    Route::get('/container/size_type',[QueriesController::class,"getContainterSizeType"]);

    Route::POST('/create_client', ["App\Http\Controllers\PostsController"::class, "createClient"]);
    Route::POST('/create_Staff', ["App\Http\Controllers\PostsController"::class, "createStaff"]);
});