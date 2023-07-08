<?php

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
use Illuminate\Support\Facades\Route;


 

use App\Http\Controllers\Accounts;
use App\Http\Controllers\User;
use App\Http\Controllers\CompanyController;

 

  
 
 
 

// start of middleware
// Route::group(['middleware' => ['CheckAdmin']], function () {


Route::get('/',[Accounts::class,'Login']);
Route::get('/Login',[Accounts::class,'Login']);
Route::post('/UserVerify',[Accounts::class,'UserVerify']);


 