<?php

 use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\RegistrationController;
 use Illuminate\Support\Facades\Auth;
 use App\Http\Controllers\CategoriesController;
 use App\Http\Controllers\ImageController;

 Auth::routes();
 
// Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [RegistrationController::class, 'handleRegistration'])->name('register.handle');

// Route::get('/home', function () {
//     return view('home');
// })->name('home');
Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}/update', [CategoriesController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
// Route::get('/upload', function () {
//     return view('images.upload'); 
// })->name('image.form');

Route::post('/upload', [ImageController::class, 'upload'])->name('image.upload');
Route::get('/user/{userId}/categories', [CategoriesController::class, 'getUserCategories']);