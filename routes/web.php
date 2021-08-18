<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
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
    $show = 'Hello welcome, ';
    if (auth()->user()) { 
        $show .= '<a href="admin/logout">logout</a>';
    } else {
        $show .= '<a href="admin">admin here</a>';   
    }
    echo $show;
});


Route::name('admin.')->group(function () {

    Route::prefix('admin')->group(function() {
        Route::get('/', [LoginController::class, 'index']);
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
        
        Route::middleware('auth')->group(function() {
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('logout', [LoginController::class, 'logout'])->name('logout');

            Route::get('template', [DashboardController::class, 'template'])->name('template');
            Route::post('add/video', [DashboardController::class, 'addVideo'])->name('add.video');
            Route::post('edit/video/{media}', [DashboardController::class, 'editVideo'])->name('edit.video');
            Route::post('edit/image/{media}', [DashboardController::class, 'editImage'])->name('edit.image');
            Route::post('delete/media/{media}/{type}', [DashboardController::class, 'deleteMedia'])->name('delete.media');
            Route::post('add/image/{type}', [DashboardController::class, 'addImage'])->name('add.image');
            Route::post('add/row/{type}', [DashboardController::class, 'addTable'])->name('add.row');
        });
    });


});
