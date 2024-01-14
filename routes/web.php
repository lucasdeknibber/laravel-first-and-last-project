<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
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
Route::middleware(['auth'])->group(function () {
    Route::resource('faq', FaqController::class);
    Route::get('faq/category/create', [FaqController::class, 'createCategory'])->name('faq.category.create'); // Updated route name
    Route::post('/faq/store-category', [FaqController::class, 'storeCategory'])->name('faq.category.store');
    Route::get('faq/category/{category}/edit', [FaqController::class, 'editCategory'])->name('faq.category.edit');
    Route::put('faq/category/{category}', [FaqController::class, 'updateCategory'])->name('faq.category.update');
    Route::delete('faq/category/{category}', [FaqController::class, 'destroyCategory'])->name('faq.category.destroy');
    Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
    Route::delete('/faq/item/{item}', [FaqController::class, 'destroyItem'])->name('faq.item.destroy');
    Route::get('/faq/item/{item}/edit', [FaqController::class, 'editItem'])->name('faq.item.edit');
    Route::put('/faq/item/{item}', [FaqController::class, 'updateItem'])->name('faq.item.update');

});
Route::get('/faq/{category}/add-item', [FaqController::class, 'createItem'])->name('faq.item.create');
Route::post('/faq/store-item', [FaqController::class, 'storeItem'])->name('faq.item.store');

Route::get('/about', [PagesController::class, 'about'])->name('pages.about');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/contact/all', [ContactController::class, 'all'])->name('contact.all');

Route::get('/user/{user}', [UserProfileController::class, 'show'])->name('user.profile');
Route::post('/user/{user}/promote', [UserProfileController::class, 'promote'])->name('promote.to.admin');

Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('posts', PostController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
