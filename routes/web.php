<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\GrobalShow;
use App\Http\Controllers\AuthShow;
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

//global route
Route::get('home', [GrobalShow::class, 'showAll']);
Route::get('home/{id}', [GrobalShow::class, 'showPost']);
Route::group(['middleware' => ['protectLoginLogout']], function(){
    //register view
    Route::view('/register', 'pages/register');
    //login view
    Route::view('/login', 'pages/login');
});

//register
Route::post('/register',[UserController::class, 'userRegister']);

//login
Route::post('/login', [UserController::class, 'userLogin']);

//use middleware
Route::group(['middleware' => ['userAuth']], function(){

    Route::get('/', [AuthShow::class, 'index']);
    Route::get('/delete/{id}', [AuthShow::class, 'delete']);
    Route::get('edit/{id}', [AuthShow::class, 'showBlog']);
    Route::post('edit', [AuthShow::class, 'update']);

    //logout
    Route::get('/logout', function (){
        if(session() -> has('logged') && session('logged')['isLogged']){
            session() -> pull('logged');
        }
        return redirect('/home');
    });

    //user uploadblog
    Route::view('/upload', 'pages/upload');
    Route::post('/upload', [UploadController::class, 'addBlog']);
});
