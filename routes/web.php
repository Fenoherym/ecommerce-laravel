<?php

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

Route::get('/', function () {
    return view('template.app');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\ProduitController::class, 'home'])->name('home');

// Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/posts/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::get('/nos-produits', [App\Http\Controllers\ProduitController::class, 'index'])->name('produit.index');
Route::get('/nos-produits/search', [App\Http\Controllers\ProduitController::class, 'search'])->name('produit.search');
Route::get('/nos-produits/{id}', [App\Http\Controllers\ProduitController::class, 'show'])->name('produit.show');

Route::patch('/panier/{rowId}', [App\Http\Controllers\CartController::class, 'update'])->name('carte.update');
Route::delete('/panier/{rowId}', [App\Http\Controllers\CartController::class, 'destroy'])->name('carte.destroy');

Route::get('/notifications',  [App\Http\Controllers\OrderController::class, 'view_notifications'])->name('notification');

Route::get('/panier', [App\Http\Controllers\CartController::class, 'index'])->name('carte.index');
Route::post('/panier/ajouter', [App\Http\Controllers\CartController::class, 'store'])->name('carte.store');
Route::get('/vide-panier', function(){
    Cart::destroy();
});

Route::middleware('auth')->group(function() {
    Route::get('/home', [App\Http\Controllers\admin\HomeController::class, 'index'])->name('admin.index');
    Route::get('admin/article', [App\Http\Controllers\admin\ProduitController::class, 'index'])->name('admin.produit.index');
    Route::get('admin/article/search', [App\Http\Controllers\admin\ProduitController::class, 'search'])->name('admin.produit.search');
    Route::get('admin/article/create', [App\Http\Controllers\admin\ProduitController::class, 'create'])->name('admin.produit.create');
    Route::post('admin/article/create', [App\Http\Controllers\admin\ProduitController::class, 'store'])->name('admin.produit.store');
    Route::get('admin/article/delete/{id}', [App\Http\Controllers\admin\ProduitController::class, 'destroy'])->name('admin.produit.delete');
    Route::get('admin/article/edit/{id}', [App\Http\Controllers\admin\ProduitController::class, 'edit'])->name('admin.produit.edit');
    Route::post('admin/article/update/{id}', [App\Http\Controllers\admin\ProduitController::class, 'update'])->name('admin.produit.update');

    Route::post('review/store', [App\Http\Controllers\ReviewController::class, 'store'])->name('review.store');

    Route::get('/paiment', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/commande', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/liste-commande', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');

    Route::get('/admin/categories', [App\Http\Controllers\admin\CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/admin/categories/create', [App\Http\Controllers\admin\CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/categories/store', [App\Http\Controllers\admin\CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/categories/delete/{id}', [App\Http\Controllers\admin\CategoryController::class, 'destroy'])->name('admin.category.delete');
    Route::get('/admin/categories/edit/{id}', [App\Http\Controllers\admin\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/categories/update/{id}', [App\Http\Controllers\admin\CategoryController::class, 'update'])->name('admin.category.update');


    Route::get('/admin/commandes', [App\Http\Controllers\admin\OrderController::class, 'index'])->name('admin.order.index');
    Route::post('/admin/commandes/validation/{id}', [App\Http\Controllers\admin\OrderController::class, 'valid_command'])->name('admin.order.validate');




});
