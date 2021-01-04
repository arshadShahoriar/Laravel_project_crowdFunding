<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\registrationController;

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
    return view('welcome');
});

Route::get('/login',[loginController::class,'index']);
Route::post('/login',[loginController::class,'verify']);

Route::get('/Registration', [registrationController::class, 'index']);
Route::post('/Registration', [registrationController::class, 'register']);


Route::group(['middleware'=>['checksession']],function(){

Route::group(['middleware'=>['checkType']],function(){
	

	Route::get('/home',[homeController::class,'index']);
	Route::get('/create_campaigns',[homeController::class,'createCampaigns']);
	Route::post('/create_campaigns',[homeController::class,'createCampaignspost']);
	Route::get('/contract',[homeController::class,'contract']); 
	Route::post('/postcontract',[homeController::class,'post_contract']);
	Route::get('/sharedCampaigns',[homeController::class,'sharedCampaigns']);
	Route::get('/about',[homeController::class,'about']);
	Route::post('/about',[homeController::class,'aboutpost']);
	Route::get('/report/{id}', [homeController::class, 'report']);
	Route::post('/report/{id}', [homeController::class, 'reportpost']);
	Route::get('/delete/{id}', [homeController::class, 'delete']);
	Route::get('/edit/{id}', [homeController::class, 'edit']);
	Route::post('/edit/{id}', [homeController::class, 'postedit']);
	Route::get('/bookmark/{id}', [homeController::class, 'bookmark']);
	Route::get('/donate/{id}',[homeController::class,'donation']);
	Route::post('/donate/{id}',[homeController::class,'postdonation']);

	Route::get('/logout', [homeController::class, 'logout']);



});

});