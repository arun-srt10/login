<?php

use App\Http\Controllers\Admin\AjaxCountryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\GoogleLoginController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('google/login', [ GoogleLoginController::class, 'googleLogin' ]);
Route::get('google/callback', [ GoogleLoginController::class, 'googleCallBack' ]);

Route::group(['prefix' => 'admin'], function () {

    Route::get('login', 'App\Http\Controllers\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'App\Http\Controllers\Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'App\Http\Controllers\Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        Route::post('get-users-list', [DashboardController::class, 'getUsersList'])->name('admin.get-users-list');
        Route::post('user-update', [DashboardController::class, 'addUpdateFn'])->name('admin.user-update');
        Route::post('user-delete', [DashboardController::class, 'delete'])->name('admin.user-delete');
        Route::post('get-country', [AjaxCountryController::class, 'getCountry'])->name('admin.get-country');
        Route::post('get-state', [AjaxCountryController::class, 'getState'])->name('admin.get-state');
        Route::post('get-city', [AjaxCountryController::class, 'getCity'])->name('admin.get-city');
        Route::post('get-row-data', [DashboardController::class, 'getRowData'])->name('admin.get-row-data');
        Route::post('get-educations', [DashboardController::class, 'getEducations'])->name('admin.get-educations');

    });

});
