<?php
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CategoryTestController;




// Register route
Route::post('/register', [RegisterController::class, 'register'])->name('register');



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');


// Login route
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
  
Route::middleware(['web', 'checklogin'])->group(function () {
    Route::get('', [TaskController::class, 'index'])->name('index');
    Route::get('tasks/{id}', [TaskController::class, 'show'])->name('products.show');
    Route::get('/add-to-cart', [TaskController::class, 'addToCart'])->name('addToCart');
    Route::get('/search', [SearchController::class, 'searchProducts'])->name('searchProducts');
    Route::get('/phones', [TaskController::class, 'phonedetails'])->name('phones');
    Route::get('/laptop', [TaskController::class, 'laptopdetails'])->name('laptop');
    Route::get('/shop', [TaskController::class, 'shopdetails'])->name('shop');
    Route::get('/fragnance', [TaskController::class, 'fragnancedetails'])->name('fragnance');
    Route::get('/skincare', [TaskController::class, 'skincaredetails'])->name('skincare');
    Route::get('/women-dress', [TaskController::class, 'dressdetails'])->name('dress');
    Route::get('/women-shoes', [TaskController::class, 'shoesdetails'])->name('shoes');
    Route::get('/category', [CategoryTestController::class, 'filterByCategory'])
    ->name('filterByCategory');
    Route::get('/products/{id}', [TaskController::class, 'showUpdateForm'])
    ->name('product.update.form');
    Route::put('/products/{id}', [TaskController::class, 'updateProduct'])
    ->name('product.update');

  
});


   