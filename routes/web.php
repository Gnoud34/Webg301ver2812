<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


Route::resource('categories', CategoriesController::class);

Route::get('/products', [ProductsController::class, 'index']); // List all products
Route::get('/products/create', [ProductsController::class, 'create']); // Show create form
Route::get('/products/delete', [ProductsController::class, 'delete']); // Delete product (make sure this is implemented correctly)
Route::get('/products/detail', [ProductsController::class, 'detail']); // Product details page
Route::post('/products', [ProductsController::class, 'store']); // Store product (POST)
Route::get('product/{id}/edit', [ProductsController::class, 'edit']); // Edit product
Route::post('/products/{id}', [ProductsController::class, 'update']); // Update product (POST)

Route::get('/', [ProductsController::class, 'index']);
Route::get('cart', [ProductsController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductsController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove.from.cart');


route::get('/', [HomeController::class, 'home']);


route::get('/dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

route::get('/myorders', [HomeController::class, 'myorders'])->middleware(['auth', 'verified']);





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';


route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);


route::get('view_category', [AdminController::class, 'view_category'])->middleware(['auth', 'admin']);


route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin']);


route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'admin']);


route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth', 'admin']);


route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth', 'admin']);


route::get('add_product', [AdminController::class, 'add_product'])->middleware(['auth', 'admin']);


route::post('upload_product', [AdminController::class, 'upload_product'])->middleware(['auth', 'admin']);


route::get('view_product', [AdminController::class, 'view_product'])->middleware(['auth', 'admin']);

route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'admin']);


route::get('update_product/{id}', [AdminController::class, 'update_product'])->middleware(['auth', 'admin']);



route::post('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth', 'admin']);


route::get('product_search', [AdminController::class, 'product_search'])->middleware(['auth', 'admin']);


route::get('product_details/{id}', [HomeController::class, 'product_details']);


route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);


route::get('mycart', [HomeController::class, 'mycart'])->middleware(['auth', 'verified']);

route::get('delete_cart/{id}', [HomeController::class, 'delete_cart'])->middleware(['auth', 'verified']);


route::post('comfirm_order', [HomeController::class, 'comfirm_order'])->middleware(['auth', 'verified']);


route::get('shop', [HomeController::class, 'shop']);

route::get('why', [HomeController::class, 'why']);


route::get('testimonial', [HomeController::class, 'testimonial']);

route::get('contact', [HomeController::class, 'contact']);

Route::controller(HomeController::class)->group(function () {
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});





route::get('view_orders', [AdminController::class, 'view_order'])->middleware(['auth', 'admin']);

route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])->middleware(['auth', 'admin']);

route::get('delivered/{id}', [AdminController::class, 'delivered'])->middleware(['auth', 'admin']);

route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])->middleware(['auth', 'admin']);