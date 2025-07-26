<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Models\Product;
use App\Models\Client;
use Illuminate\Http\Request;
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
    Route::resource('/products', ProductController::class);
    Route::resource('/clients', ClientController::class);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::get('/', function (Request $request) {
    $min = $request->input('min_price');
    $max = $request->input('max_price');

    $query = Product::query();

    if ($min !== null) {
        $query->where('price', '>=', $min);
    }
    if ($max !== null) {
        $query->where('price', '<=', $max);
    }

    $products = $query->paginate(6)->withQueryString();

    return view('frontend.index', compact('products', 'min', 'max'));
});

Route::get('/product/{id}/details', function ($id) {
    $product = Product::findOrFail($id);
    return view('frontend.details', compact('product'));
});

Route::get('/product/{id}/order', function ($id) {
    $product = Product::findOrFail($id);
    return view('frontend.order', compact('product'));
});

Route::post('/product/{id}/order', function (Request $request, $id) {
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'number' => 'required|string|max:255',
    ]);

    Client::create([
        'name' => $request->name,
        'number' => $request->number,
    ]);

    $msg = urlencode("Commande pour le produit: $product->name\nNom: {$request->name}\nNuméro: {$request->number}");
    return redirect("https://wa.me/213659181999?text=$msg");
});