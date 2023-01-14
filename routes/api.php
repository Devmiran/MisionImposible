<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
//RUTAS DE POST
/* Route::middleware('jwtauth:api')->get('/posts', [PostController::class,'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::post('/posts',[UserController::class,'store']);
Route::put('/posts/{id}',[UserController::class,'update']);
Route::delete('/posts/{id}',[UserController::class,'destroy']); */


//LE PONGO UN NOMBRE A LAS RUTAS
Route::group([
   'prefix'=>'posts',
   'controller'=>PostController::class,
   'middleware'=>'jwtauth:api'
],function(){
    Route::group([
        'middleware'=> 'role:blogger|admin'  
    ], function(){ 
    Route::get('/','index')->name('posts.index');
    Route::get('/{id}','show')->name('posts.show');
    Route::post('/','store')->name('posts.store');
    Route::put('/{id}','update')->name('posts.update');
    Route::delete('/{id}','destroy')->name('posts.destroy');

    });
});


//RUTAS DE USUARIOS!!!
/* Route::get('/users',[UserController::class,'index']);
Route::get('/users/{id}', [UserController::class,'show']);
Route::post('/users',[UserController::class,'store']);
Route::put('/users/{id}',[UserController::class,'update']);
Route::delete('/users/{id}',[UserController::class,'destroy']); */

Route::group([
    'prefix'=>'users',
    'controller'=>UserController::class,
    'middleware'=>'jwtauth:api'
 ],function(){
    //HACER OTRA RUTAAAAAAAA Y PUES UN MIDDLEWARE
    Route::group([
        'middleware'=> 'role:admin'  
    ], function(){ 
     Route::get('/','index')->name('users.index');
     Route::get('/{id}','show')->name('users.show');
     Route::post('/','store')->name('users.store');
     Route::put('/{id}','update')->name('users.update');
     Route::delete('/{id}','destroy')->name('users.destroy');
    });
 });

//LUEGOOOO IR AL KERNEL, DE AQUI AL KERNEL
Route::group([
    'prefix' => 'auth',
    'controller' => AuthController::class
], function ($router) {

    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::middleware('jwtauth:api')->group(function(){
        Route::get('refresh', 'refresh');
        Route::get('me', 'me');
    });

});

//IR A DATABASESEEDER