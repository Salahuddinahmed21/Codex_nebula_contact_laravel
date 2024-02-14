<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


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
Route::get('/', [ClientController::class, 'index']);
Route::post('ClientStore', [ClientController::class, 'store'])->name('ClientStores');
Route::Get('ClientDetailView', [ClientController::class, 'ClientDetails'])->name('ClientDetailViews');
Route::post('ClientDetailStore', [UserController::class, 'store'])->name('ClientDetailStore');
Route::post('featurestore', [UserController::class, 'feature']);


//admin_section
Route::group(['middleware' => 'admin_auth'], function () {
Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::post('registeruser', [AdminController::class, 'store'])->name('registeruser');
Route::get('UserRegister', [AdminController::class, 'create'])->name('UserRegister');
Route::get('userIndex', [AdminController::class, 'usertable'])->name('userIndex');


Route::get('/logout', function () {
    session()->forget('ADMIN_LOGIN');
    session()->forget('ADMIN_ID');
    session()->flash('error', 'Logout sucessfully');
    return redirect('/login');
 });
});

Route::get('login', [AdminController::class, 'login'])->name('login');
Route::post('signin', [AdminController::class, 'SignIn'])->name('SignIn');
