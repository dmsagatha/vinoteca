<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Wine\CategoryController;
use App\Http\Controllers\WineController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  ray("Hola desde el archivo web.php");
  ray(collect([1, 2, 3]));

  return view('welcome');
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

Route::group(['middleware' => ['auth', 'verified']], function ()
{
  // Route::resource('categories', CategoryController::class)->except('show');
  Route::resource('categorias', CategoryController::class)
    ->parameters(['categorias' => 'category'])
    ->names('categories')
    ->except('show');

  Route::resource('vinos', WineController::class)
    ->parameters(['vinos' => 'wine'])
    ->names('wines')
    ->except('show');

  Route::prefix('tienda')->name('shop.')->controller(ShopController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('adicionar-al-carro', 'addToCart')->name('addToCart');
    Route::post('incrementar', 'increment')->name('increment');
    Route::post('decrementar', 'decrement')->name('decrement');
    Route::post('eliminar', 'remove')->name('remove');
  });

  Route::prefix('carro')->name('cart.')->controller(CartController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('incrementar', 'increment')->name('increment');
    Route::post('decrementar', 'decrement')->name('decrement');
    Route::post('eliminar', 'remove')->name('remove');
    Route::post('limpiar', 'clear')->name('clear');
  });

  /* Route::prefix('usuarios')->name('emails.')->controller(UserController::class)->group(function () {
    Route::post('enviar-correos', 'sendEmails')->name('send.emails');
  }); */
  
  // Route::post('/send-emails', [UserController::class, 'sendEmails'])->name('send.emails');

  Route::get('usuarios', [UserController::class, 'index'])->name('users.index');
  Route::post('usuarios/enviar-correos', [UserController::class, 'sendEmails'])->name('send.emails');
});