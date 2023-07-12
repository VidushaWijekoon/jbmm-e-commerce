<?php

use App\Http\Controllers\Admin\AdminHomepageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\HomapageController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [HomapageController::class, 'index'])->name('website.homepage');

Route::prefix('/admin')->group(function () {
    Route::controller(AdminHomepageController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('admin.dashboard');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('admin.category');
        Route::get('/category/create', 'create')->name('admin.category.create');
        Route::post('/category/', 'store')->name('admin.category.store');
        Route::get('/category/{category}/show', 'show')->name('admin.category.show');
        Route::get('/category/{category}/edit', 'edit')->name('admin.category.edit');
        Route::put('/category/{category}/', 'update')->name('admin.category.update');
        Route::get('/category/{category}/destroy', 'destroy')->name('admin.category.destroy');
    });
});
