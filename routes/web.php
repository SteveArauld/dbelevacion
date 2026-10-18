<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// ==========================================
// PAGE D'ACCUEIL
// ==========================================
Route::get('/', function () {
    // Produits en vedette pour le carrousel
    $sliderProducts = Product::active()->featured()->latest('price')->take(10)->get();

    if ($sliderProducts->isEmpty()) {
        $sliderProducts = Product::active()->inStock()->latest('price')->take(10)->get();
    }

    // Première grille de produits
    $featuredProducts = Product::active()->inStock()->latest('id')->take(5)->get();

    // Seconde grille de produits
    $latestProducts = Product::active()->inStock()->where('name', 'LIKE', '%jcb%')->inRandomOrder()->take(5)->get();
    $latestProducts2 = Product::active()->inStock()
    ->where(function($q) {
        $q->where('name', 'LIKE', '%CS12%')
          ->orWhere('name', 'LIKE', '%Apilador%');
         
    })->inRandomOrder()->take(10)->get();
   // dd($latestProducts2);
    return view('welcome', compact('sliderProducts', 'featuredProducts', 'latestProducts','latestProducts2'));
})->name('home');

// ==========================================
// PAGES STATIQUES
// ==========================================
Route::get('/aviso-legal', function () {
    return view('pages.aviso-legal');
})->name('aviso-legal');




Route::get('/commander', function () {
    return view('pages.commander');
});


Route::get('/politica-de-privacidad', function () {
    return view('pages.politica-de-privacidad');
})->name('politica-privacidad');

Route::get('/condiciones-generales-de-venta-cgv', function () {
    return view('pages.condiciones-generales-de-venta-cgv');
})->name('condiciones-venta');

Route::get('/politica-de-envio', function () {
    return view('pages.politica-de-envio');
})->name('politica-envio');

Route::get('/pago-en-espanol', function () {
    return view('pages.pago-en-espanol');
})->name('pago-espanol');

Route::get('/politica-de-devoluciones-y-reembolsos', function () {
    return view('pages.politica-de-devoluciones-y-reembolsos');
})->name('politica-devoluciones');

Route::get('/politica-de-seguro-y-garantia-del-vendedor', function () {
    return view('pages.politica-de-seguro-y-garantia-del-vendedor');
})->name('politica-garantia');

Route::get('/contacto', function () {
    return view('pages.contacto');
})->name('contacto');

// Newsletter
Route::post('/newsletter/subscribe', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
    ]);
    
    // Ici tu peux sauvegarder l'email en base de données
    // ou appeler une API Mailchimp, etc.
    
    return redirect()->back()->with('success', '¡Gracias por suscribirse!');
})->name('newsletter.subscribe');

// ==========================================
// CATÉGORIES (10 catégories principales)
// ==========================================
Route::get('/transpaletas', [CategoryController::class, 'index'])
    ->name('category.transpaletas');

Route::get('/carros-de-transporte', [CategoryController::class, 'index'])
    ->name('category.carros-transporte');

Route::get('/carretillas-elevadoras', [CategoryController::class, 'index'])
    ->name('category.carretillas');

Route::get('/carro-salvaescaleras', [CategoryController::class, 'index'])
    ->name('category.salvaescaleras');

Route::get('/plataformas-de-tijera', [CategoryController::class, 'index'])
    ->name('category.plataformas');

Route::get('/mesas-elevadoras', [CategoryController::class, 'index'])
    ->name('category.mesas');

Route::get('/apiladores-de-gran-elevacion', [CategoryController::class, 'index'])
    ->name('category.apiladores');

Route::get('/elevadores-con-cesta', [CategoryController::class, 'index'])
    ->name('category.elevadores');

Route::get('/miniexcavadora', [CategoryController::class, 'index'])
    ->name('category.miniexcavadora');

Route::get('/minilifts', [CategoryController::class, 'index'])
    ->name('category.minilifts');

    // ==========================================
// RECHERCHE & PANIER (localStorage)
// ==========================================
Route::get('/buscar', [SearchController::class, 'index'])->name('search');
Route::view('/carrito', 'cart')->name('cart');

// ==========================================
// COMMANDE / CHECKOUT
// ==========================================
Route::get('/commander', [OrderController::class, 'create'])->name('checkout');
Route::post('/commander', [OrderController::class, 'store'])->name('checkout.store');
Route::get('/commander/gracias', [OrderController::class, 'thanks'])->name('checkout.thanks');

// ==========================================
// PRODUITS (doit être en DERNIER)
// ==========================================
Route::get('/product/{slug}', [ProductController::class, 'show'])
    ->name('product.show');