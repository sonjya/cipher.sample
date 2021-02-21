<?php

use App\Http\Controllers\ValidationController;
use Illuminate\Support\Facades\Route;

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

//get -----------------------------------------------------------
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('loginform');
});
Route::get('/registration', function () {
    return view('client.registerform');
});
Route::get('/main', function () {
   if(session('isactive')=='YES'){
    return view('client.mainform');
   }else{
       return redirect()->back();
   };
});
Route::get('/logout', function () {
    session(['isactive' => "NO"]);
    return view('loginform');
});

//post ---------------------------------------------------------
Route::post('/register',[ValidationController::class,'register']);
Route::post('/signin',[ValidationController::class,'login']);