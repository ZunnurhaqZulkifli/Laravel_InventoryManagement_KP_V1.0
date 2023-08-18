<?php

use App\Http\Controllers\AdminController;
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

// Home 
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/test', [HomeController::class, 'testPage'])->name('testPage');
Route::get('/home.image.store', [HomeController::class,'store'])->name('home.image.store');
Route::get('/home.image.upload', [HomeController::class,'homeImageUpload'])->name('home.image.upload');

// Users
Route::resource('/users', UsersController::class)->except(['show', 'index', 'edit']);

// Products
Route::resource('/products' , ProductsController::class)->except(['edit']);
Route::get('/best.seller', [ProductsController::class, 'hotItem'])->name('best.seller');
Route::get('/products.stats', [ProductsController::class, 'stats'])->name('products.stats');
Route::get('/products.brands', [ProductsController::class, 'brands'])->name('products.brands');
Route::get('/products.variations', [ProductsController::class, 'variations'])->name('products.variations');

// Brands
Route::resource('/brands', BrandsController::class)->except(['create']);
Route::get('/brands.all', [BrandsController::class, 'all'])->name('brands.all');

// Categories
Route::resource('/categories', CategoriesController::class)->except(['create']);
Route::get('/categories.all', [CategoriesController::class, 'all'])->name('categories.all');

// Variations
Route::resource('/variation', VariationsController::class)->except('create');
Route::get('/variation.all', [VariationsController::class, 'all'])->name('variation.all');

// Cart Routes
Route::get('/cart', [ProductsController::class, 'cart'])->name('shopping.cart');
Route::get('/products.all', [ProductsController::class, 'all'])->name('products.all');
Route::post('/sales.create', [ProductsController::class, 'addtoTotalSale'])->name('addtoTotalSale');
Route::get('/product/{id}', [ProductsController::class, 'addProductstoCart'])->name('addproducts.to.cart');
Route::patch('/update-shopping-cart', [ProductsController::class, 'updateCart'])->name('update.sopping.cart');
Route::get('/product/remove/{id}', [ProductsController::class, 'subtractProductstoCart'])->name('remove.items');
Route::delete('/delete-cart-product', [ProductsController::class, 'deleteProduct'])->name('delete.cart.product');
Route::post('/calculate-payable-amount', [ProductsController::class, 'calculatePayableAmount'])->name('calculatePayableAmount');

//Sales Routes
Route::resource('/sales', SalesController::class);
Route::get('/sales.store', [SalesController::class, 'store'])->name('sales.store');
Route::get('/sales.today', [SalesController::class, 'salesToday'])->name('sales.today');
Route::post('/sales/add', [SalesController::class, 'addtoTotalSale'])->name('sales.add');
Route::get('/users/sales/{id}', [SalesController::class, 'salesByUser'])->name('sales.user');
Route::get('/sales.yesterday', [SalesController::class, 'salesYesterday'])->name('sales.yesterday');
Route::get('/sales.report', [SalesController::class, 'report'])->name('sales.report');

//Gallery Controller
Route::resource('/gallery', GalleryController::class);

//Admins Only
Route::get('/admin/products/create', [AdminController::class, 'create'])->name('admin.products.create');
Route::get('/users', [UsersController::class, 'index'])->name('users.index')->middleware('can:users.index');
Route::get('/users/{id}', [UsersController::class, 'show'])->name('users.show')->middleware('can:users.show');
Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit')->middleware('can:users.edit');
Route::get('/brand/create', [BrandsController::class, 'create'])->name('brands.create')->middleware('can:brands.create');
Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit')->middleware('can:products.edit');
Route::get('/category/create', [CategoriesController::class, 'create'])->name('categories.create')->middleware('can:categories.create');
Route::get('/variation.create', [VariationsController::class, 'create'])->name('variation.create')->middleware('can:variation.create');

Auth::routes();

