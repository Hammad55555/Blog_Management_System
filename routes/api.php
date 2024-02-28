<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
    Route::get('blog/{id}', [PostController::class, 'show'])->name('blog.show');
    Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
    Route::get('/blog/{id}', [PostController::class, 'show'])->name('blog.show');
    Route::post('/blogs', [PostController::class, 'store'])->name('blog.store');
    Route::get('/blogs', [PostController::class, 'viewblog'])->name('blog.store-get');
    Route::get('/blog/{id}/edit', [PostController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{id}', [PostController::class, 'update'])->name( 'blog.update');
    Route::delete('/blog/{id}', [PostController::class, 'destroy'])->name('blog.destroy');
    Route::post('/admin/assign-role', 'AdminController@assignRole')->name('blog.assignRole');
    Route::get('/admin/assign-role', 'AdminController@assignRoleShow')->name('admin.assignRole');

});
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
