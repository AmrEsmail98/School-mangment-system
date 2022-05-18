<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
Route::get('/admin/logout',[AdminController::class ,'Logout'])->name('admin.logout');

// Management User

Route::prefix('user')->group(function(){
Route::get('/view',[UserController::class,'UserView'])->name('user.view');
Route::get('/add',[UserController::class,'UserAdd'])->name('users.add');
Route::post('/store',[UserController::class,'UserStore'])->name('user.store');
Route::get('/edit/{id}',[UserController::class,'UserEdit'])->name('users.edit');
Route::Post('/update/{id}',[UserController::class,'UserUpdate'])->name('user.update');
Route::get('/delete/{id}',[UserController::class,'UserDelete'])->name('users.delete');
});


