<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UserController;
Use App\Http\Controllers\FutsalController;
Use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;


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


Route::get('/',[FrontendController::class, 'home']);
Route::get('/futsals',[FrontendController::class, 'futsals']);
Route::get('/futsals/{id}',[FrontendController::class, 'futsalDetail']);
Route::get('/futsals/{id}/book',[FrontendController::class, 'booking']);

require __DIR__.'/auth.php';

// Route::get('/user',[UserController::class, 'index']);

 Route::group(['prefix'=>'admin','middleware'=>'admin'],function (){
        Route::get('/',[UserController::class, 'index']);

        Route::group(['prefix'=>'users','middleware'=>'auth'],function (){

    	    Route::get('/',[UserController::class, 'index']);
    	    Route::post('/updateuserinfo/{id}',[UserController::class, 'UpdateUser']);
    	    Route::get('/add-user',[UserController::class, 'addUser']);
            Route::post('/search-user',[UserController::class, 'searchuserForAdmin']);
            Route::post('/add-user',[UserController::class, 'addNewUser']);
            Route::get('/edit-user/{id}',[UserController::class, 'editUser']);
            Route::post('/edit-user/{id}',[UserController::class, 'updateUser']);
            Route::post('/delete-user/{id}',[UserController::class, 'deleteUser']);

        });
        Route::group(['prefix'=>'futsal','middleware'=>'auth'],function (){

    	    Route::get('/',[FutsalController::class, 'index']);
            Route::get('/{id}',[FutsalController::class, 'show']);
    	    Route::get('/create',[FutsalController::class, 'create']);
            Route::post('/add-futsal',[FutsalController::class, 'store']);
    	    Route::post('/updatefutsalinfo/{id}',[FutsalController::class, 'UpdateFutsal']);
            Route::post('/search-futsal',[FutsalController::class, 'searchFutsalForAdmin']);
            Route::get('/edit-futsal/{id}',[FutsalController::class, 'editFutsal']);
            Route::post('/edit-futsal/{id}',[FutsalController::class, 'updateFutsal']);
            Route::post('/delete-futsal/{id}',[FutsalController::class, 'deleteFutsal']);

        });


    });
