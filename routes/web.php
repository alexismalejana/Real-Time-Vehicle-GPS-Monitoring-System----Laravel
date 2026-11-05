<?php

use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\GPSTrackerController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
    //return view('welcome');
//});
Route::middleware('alreadyLoggedIn')->group(function() {
    Route::get('/admin/login',[AuthController::class, 'login'])->name('admin.auth.login');
    Route::get('/admin/signup',[AuthController::class, 'signup'])->name('admin.auth.signup');
    Route::post('/admin/signup',[AuthController::class, 'create'])->name('admin.auth.create');
    Route::get('/admin/login',[AuthController::class, 'login'])->name('admin.auth.login');
    Route::post('/admin/login',[AuthController::class, 'insert'])->name('admin.auth.insert');
});

Route::get('logout',[AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth','preventBackHistory'])->group(function() {
    Route::get('/admin/dashboard',[DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/users/list',[UserController::class, 'list'])->name('admin.users.list');
    Route::get('/admin/users/add',[UserController::class, 'add'])->name('admin.users.add');
    Route::post('/admin/users/add',[UserController::class, 'create'])->name('admin.users.create');
    Route::get('/admin/users/edit/{id}',[UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/admin/users/edit/{id}',[UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/delete/{id}',[UserController::class, 'delete'])->name('admin.users.delete');

    Route::get('/admin/vehicle/list',[VehicleController::class, 'list'])->name('admin.vehicle.list');
    Route::get('/admin/vehicle/add',[VehicleController::class, 'add'])->name('admin.vehicle.add');
    Route::post('/admin/vehicle/add',[VehicleController::class, 'create'])->name('admin.vehicle.create');
    Route::get('/admin/vehicle/edit/{id}',[VehicleController::class, 'edit'])->name('admin.vehicle.edit');
    Route::post('/admin/vehicle/edit/{id}',[VehicleController::class, 'update'])->name('admin.vehicle.update');
    Route::delete('/admin/vehicle/delete/{id}',[VehicleController::class, 'delete'])->name('admin.vehicle.delete');

    Route::get('/admin/gpstracker/list',[GPSTrackerController::class, 'list'])->name('admin.gpstracker.list');
    Route::get('/admin/gpstracker/add',[GPSTrackerController::class, 'add'])->name('admin.gpstracker.add');
    Route::post('/admin/gpstracker/add',[GPSTrackerController::class, 'create'])->name('admin.gpstracker.create');
    Route::get('/admin/gpstracker/edit/{id}',[GPSTrackerController::class, 'edit'])->name('admin.gpstracker.edit');
    Route::post('/admin/gpstracker/edit/{id}',[GPSTrackerController::class, 'update'])->name('admin.gpstracker.update');
    Route::delete('/admin/gpstracker/delete/{id}',[GPSTrackerController::class, 'delete'])->name('admin.gpstracker.delete');
    Route::get('/admin/gpstracker/map/{id}',[GPSTrackerController::class, 'map'])->name('admin.gpstracker.map');
    Route::get('/admin/gpstracker/map/{id}',[GPSTrackerController::class, 'map_view'])->name('admin.gpstracker.map');

    Route::get('/admin/changepassword/changepassword',[AuthController::class, 'changepassword'])->name('admin.changepassword.changepassword');
    Route::post('/admin/changepassword/changepassword',[AuthController::class, 'change_password'])->name('admin.changepassword.change_password');

    Route::get('/admin/myprofile/myprofile',[UserController::class, 'myprofile'])->name('admin.myprofile.myprofile');
    Route::post('/admin/myprofile/myprofile',[UserController::class, 'myprofile_update'])->name('admin.myprofile.myprofile_update');
    

    Route::get('/admin/setting/setting',[SettingController::class, 'setting'])->name('admin.setting.setting');
    Route::post('/admin/setting/setting',[SettingController::class, 'update_setting'])->name('admin.setting.update_setting');
    
    Route::post('admin/users/force-logout/{id}',[UserController::class, 'forceLogout'])->name('admin.users.forceLogout');
});