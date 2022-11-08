<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\PostController;
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

Route::get('/', [PageController::class, 'home']);
Route::get('/categories/{id}', [PageController::class, 'filterByCategory'])->name('categories.home');

Route::get('/posts/show/{id}-{slug}', [PostController::class, 'show'])->name('pages.show');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/posts', [AdminPostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [AdminPostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [AdminPostController::class, 'store'])->name('posts.store');
    Route::get('/posts/edit/{post}', [AdminPostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [AdminPostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/destroy/{id}', [AdminPostController::class, 'destroy'])->name('posts.destroy');

    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [AdminCategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{category}', [AdminCategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/destroy/{id}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/tags', [AdminTagController::class, 'index'])->name('tags.index');
    Route::get('/tags/create', [AdminTagController::class, 'create'])->name('tags.create');
    Route::post('/tags/store', [AdminTagController::class, 'store'])->name('tags.store');
    Route::get('/tags/edit/{tag}', [AdminTagController::class, 'edit'])->name('tags.edit');
    Route::put('/tags/{tag}', [AdminTagController::class, 'update'])->name('tags.update');
    Route::delete('/tags/destroy/{id}', [AdminTagController::class, 'destroy'])->name('tags.destroy');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
