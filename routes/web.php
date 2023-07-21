<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VariationsController;
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

//prior starting laravel -  php artisan serve --host=127.0.0.2 --port=8080 

// Home 
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/test', [HomeController::class, 'testPage'])->name('testPage');
Route::get('/home.image.store', [HomeController::class,'store'])->name('home.image.store');
Route::get('/home.image.upload', [HomeController::class,'homeImageUpload'])->name('home.image.upload');

// Users
Route::resource('/user', UsersController::class);

// Products
Route::resource('/products' , ProductsController::class);
Route::get('/products.all', [ProductsController::class, 'all'])->name('products.all');
Route::get('/best.seller', [ProductsController::class, 'hotItem'])->name('best.seller');
Route::get('/products.brands', [ProductsController::class, 'brands'])->name('products.brands');
Route::get('/products.variations', [ProductsController::class, 'variations'])->name('products.variations');
Route::get('/products.stats', [ProductsController::class, 'stats'])->name('products.stats');
    
// Brands
Route::resource('/brands', BrandsController::class);
Route::get('/brands.all', [BrandsController::class, 'allBrands'])->name('brands_all');

// Categories
Route::resource('/categories', CategoriesController::class);
Route::get('/categories.products', [CategoriesController::class, 'index'])->name('categories.products');

// Variations
Route::resource('/variations', VariationsController::class);
Route::get('variations.all', [VariationsController::class, 'all'])->name('variations.all');

// Cart Routes
Route::get('/shopping-cart', [ProductsController::class, 'productCart'])->name('shopping.cart');
Route::get('/product/{id}', [ProductsController::class, 'addProductstoCart'])->name('addproducts.to.cart');
Route::get('/product/revmove/{id}', [ProductsController::class, 'subtractProductstoCart'])->name('remove.items');
Route::patch('/update-shopping-cart', [ProductsController::class, 'updateCart'])->name('update.sopping.cart');
Route::delete('/delete-cart-product', [ProductsController::class, 'deleteProduct'])->name('delete.cart.product');
Route::post('/sales.create', [ProductsController::class, 'addtoTotalSale'])->name('addtoTotalSale');

//Sales Routes
Route::resource('/sales', SalesController::class);
Route::post('/sales/add', [SalesController::class, 'addtoTotalSale'])->name('sales.add');
Route::get('/sales-record', [SalesController::class, 'sales'])->name('sales.record');
Route::get('/sales.store', [SalesController::class, 'store'])->name('sales.store');
// Route::get('/shopping-cart', [ProductsController::class, 'productCart'])->name('shopping.cart');

//Gallery Controller
Route::resource('/gallery', GalleryController::class);
Route::get('/gallery', [GalleryController::class, 'all'])->name('gallery.all');

Auth::routes();

