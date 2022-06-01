<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
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
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

// Management User CRUD

Route::prefix('user')->group(function () {
    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
    Route::Post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');
});

// mangement Profile and change password
Route::prefix('profile')->group(function () {
    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
});

// Student Class Route
Route::prefix('setups')->group(function () {
    Route::get('/student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');
    Route::get('/student/class/add', [StudentClassController::class, 'AddStudent'])->name('student.class.add');
    Route::post('/student/class/store', [StudentClassController::class, 'StoreStudent'])->name('student.class.store');
    Route::get('/student/class/edit/{id}', [StudentClassController::class, 'EditStudent'])->name('student.class.edit');
    Route::post('/student/class/update/{id}', [StudentClassController::class, 'UpdateStudent'])->name('student.class.update');
    Route::get('/student/class/delete/{id}', [StudentClassController::class, 'DeleteStudent'])->name('student.class.delete');

    //Student year
    Route::get('/student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');
    Route::get('/student/year/add', [StudentYearController::class, 'AddYear'])->name('student.year.add');
    Route::post('/student/year/store', [StudentYearController::class, 'StoreYear'])->name('student.year.store');
    Route::get('/student/year/edit/{id}', [StudentYearController::class, 'EditYear'])->name('student.year.edit');
    Route::post('/student/year/update/{id}', [StudentYearController::class, 'UpdateYear'])->name('student.year.update');
    Route::get('/student/year/delete/{id}', [StudentYearController::class, 'DeleteYear'])->name('student.year.delete');

    // student group
    Route::get('/student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');
    Route::get('/student/group/add', [StudentGroupController::class, 'AddGroup'])->name('student.group.add');
    Route::post('/student/group/store', [StudentGroupController::class, 'StoreGroup'])->name('student.group.store');
    Route::get('/student/group/edit/{id}', [StudentGroupController::class, 'EditGroup'])->name('student.group.edit');
    Route::post('/student/group/update/{id}', [StudentGroupController::class, 'UpdateGroup'])->name('student.group.update');
    Route::get('/student/group/delete/{id}', [StudentGroupController::class, 'DeleteGroup'])->name('student.group.delete');

    // Student Shift
    Route::get('/student/shift/view', [StudentShiftController::class, 'ViewShift'])->name('student.shift.view');
    Route::get('/student/shift/add', [StudentShiftController::class, 'AddShift'])->name('student.shift.add');
    Route::post('/student/shift/store', [StudentShiftController::class, 'StoreShift'])->name('student.shift.store');
    Route::get('/student/shift/edit/{id}', [StudentShiftController::class, 'EditShift'])->name('student.shift.edit');
    Route::post('/student/shift/update/{id}', [StudentShiftController::class, 'UpdateShift'])->name('student.shift.update');
    Route::get('/student/shift/delete/{id}', [StudentShiftController::class, 'DeleteShift'])->name('student.shift.delete');

     //Fee category
     Route::get('fee/category/view', [FeeCategoryController::class, 'ViewFee'])->name('fee.category.view');
     Route::get('fee/category/add', [FeeCategoryController::class, 'AddFee'])->name('fee.category.add');
     Route::post('fee/category/store', [FeeCategoryController::class, 'StoreFee'])->name('fee.category.store');
     Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'EditFee'])->name('fee.category.edit');
     Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'UpdateFee'])->name('fee.category.update');
     Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'DeleteFee'])->name('fee.category.delete');

     // fee category amount
     Route::get('fee/amount/view', [FeeAmountController::class, 'ViewFeeamount'])->name('fee.amount.view');
     Route::get('fee/amount/add', [FeeAmountController::class, 'AddFeeamount'])->name('fee.amount.add');
     Route::post('fee/amount/store', [FeeAmountController::class, 'Storeamount'])->name('fee.amount.store');
     Route::get('fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'Editamount'])->name('fee.amount.edit');
     Route::post('fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'Updateamount'])->name('fee.amount.update');
     Route::get('fee/amount/detalis/{fee_category_id}', [FeeAmountController::class, 'Detalisamount'])->name('fee.amount.detalis');

});

