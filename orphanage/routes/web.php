<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChildrenController;
use App\Http\Controllers\Admin\AdminParentController;
use App\Http\Controllers\Admin\SuperVisorController;
use App\Http\Controllers\Parent\ParentController;
use App\Http\Controllers\Admin\VisitorsController;
use App\Http\Controllers\Admin\AdoptionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SuperVisesController;
use App\Http\Controllers\Admin\AcVisitorsController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Routing\Controllers\Middleware;


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

//------------------Front------------------------------




//------------------authentication------------------------------
Route::middleware('IsGuest')->group(function(){
Route::get('signin',[AuthenticationController::class,'signin'])->name('signin');
Route::post('signin',[AuthenticationController::class,'handleLogin'])->name('handleLogin');

Route::post('register',[AuthenticationController::class,'handleRegister'])->name('handleRegister');
Route::get('register',[AuthenticationController::class,'register'])->name('register');

});


//-------------------admin view---------------------------------------

 Route::middleware('IsLoginAdmin')->group(function(){
Route::group(['prefix'=>'Admin'],function()
{ Route::resources([
  'children'=>ChildrenController::class,
  'Aparents'=>AdminParentController::class,
  'supervisors'=>SuperVisorController::class,
  'adoptions'=>AdoptionController::class,
  'visits'=>VisitorsController::class,
  'supervises'=>SuperVisesController::class,
]);
Route::get('admin',[AdminController::class,'index'] )->name('admin');
Route::get('AcVisits',[AcVisitorsController::class,'index'])->name('ACVisitors');
Route::delete('AcVisits/{id}',[AcVisitorsController::class,'destroy'])->name('AcVisits.destroy');
}
);


});




//-------------------parent view---------------------------------------
Route::middleware('IsLogin')->group(function(){
    Route::get('logout',[AuthenticationController::class,'logout'])->name('logout');
    Route::post('parents/visit/{P_id}',[ParentController::class,'visits'] )->name('parents.visit');

 });
    Route::get('/',[HomeController::class,'index'])->name('/');
    Route::resources(['parents'=>ParentController::class]);
    Route::get('about',[ParentController::class,'about'] )->name('about');




