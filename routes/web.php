<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostFormController;
use App\Http\Controllers\AdminController;
use App\Models\Post;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function (){
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
    Route::get('blog/{id}',[PostController::class, 'show'])->name('blog.show');

    Route::get('/admin', [AdminController::class, 'index'])->name('blog.assignRoleShow');
    Route::post('assign-role/{user}/{role}', [AdminController::class, 'assignRole'])->name('admin.assignRole');




});


Route::post('/posts/create',[PostFormController::class, 'store'])->name('blog.create');
Route::get('/posts/{post}/edit', 'PostFormController@edit');
Route::post('/posts', 'PostFormController@store');
Route::put('/posts/{post}', 'PostFormController@update');






require __DIR__.'/auth.php';
