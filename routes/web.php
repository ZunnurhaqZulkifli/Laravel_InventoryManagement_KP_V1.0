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

// Home 
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/test', [HomeController::class, 'testPage'])->name('testPage');
Route::get('/home.image.store', [HomeController::class,'store'])->name('home.image.store');
Route::get('/home.image.upload', [HomeController::class,'homeImageUpload'])->name('home.image.upload');

// Users
Route::resource('/users', UsersController::class);

// Products
Route::resource('/products' , ProductsController::class)->except(['edit']);
Route::get('/products.all', [ProductsController::class, 'all'])->name('products.all');
Route::get('/best.seller', [ProductsController::class, 'hotItem'])->name('best.seller');
Route::get('/products.stats', [ProductsController::class, 'stats'])->name('products.stats');
Route::get('/products.brands', [ProductsController::class, 'brands'])->name('products.brands');
Route::get('/products.variations', [ProductsController::class, 'variations'])->name('products.variations');

// Brands
Route::resource('/brands', BrandsController::class)->except(['create']);
Route::get('/brands.all', [BrandsController::class, 'allBrands'])->name('brands_all');

// Categories
Route::resource('/categories', CategoriesController::class)->except(['create']);
Route::get('/categories.products', [CategoriesController::class, 'index'])->name('categories.products');

// Variations
Route::resource('/variations', VariationsController::class)->except('create');
Route::get('variations.all', [VariationsController::class, 'all'])->name('variations.all');

// Cart Routes
Route::get('/cart', [ProductsController::class, 'cart'])->name('shopping.cart');
Route::post('/sales.create', [ProductsController::class, 'addtoTotalSale'])->name('addtoTotalSale');
Route::get('/product/{id}', [ProductsController::class, 'addProductstoCart'])->name('addproducts.to.cart');
Route::patch('/update-shopping-cart', [ProductsController::class, 'updateCart'])->name('update.sopping.cart');
Route::get('/product/remove/{id}', [ProductsController::class, 'subtractProductstoCart'])->name('remove.items');
Route::delete('/delete-cart-product', [ProductsController::class, 'deleteProduct'])->name('delete.cart.product');
Route::post('/calculate-payable-amount', [ProductsController::class, 'calculatePayableAmount'])->name('calculatePayableAmount');

//Sales Routes
Route::resource('/sales', SalesController::class);
Route::get('/sales.all', [SalesController::class, 'salesAll'])->name('sales.all');
Route::get('/sales.store', [SalesController::class, 'store'])->name('sales.store');
Route::get('/sales.today', [SalesController::class, 'salesToday'])->name('sales.today');
Route::post('/sales/add', [SalesController::class, 'addtoTotalSale'])->name('sales.add');
Route::get('/sales/user/{id}', [SalesController::class, 'salesUser'])->name('sales.user');
Route::get('/sales.yesterday', [SalesController::class, 'salesYesterday'])->name('sales.yesterday');

//Gallery Controller
Route::resource('gallery', GalleryController::class);
Route::get('/gallery.all', [GalleryController::class, 'all'])->name('gallery.all');

//Admins Only
Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit')->middleware('can:products.edit');
Route::get('/variation/create', [VariationsController::class, 'create'])->name('variations.create')->middleware('can:variations.create');
Route::get('/category/create', [CategoriesController::class, 'create'])->name('categories.create')->middleware('can:categories.create');
Route::get('/brand/create', [BrandsController::class, 'create'])->name('brands.create')->middleware('can:brands.create');

Auth::routes();

