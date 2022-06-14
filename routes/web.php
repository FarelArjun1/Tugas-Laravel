<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//
Route::get('/', function () {
    return view('index', [
        "title" => "Beranda"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "nama" => "Farel Arjun W",
        "email" => "arjunfarel123@gmail.com",
        "gambar" => "farrel.jpg"
    ]);
});

Route::get('/gallery', function () {
    return view('gallery', [
        "title" => "Gallery"
    ]);
});
// Route::resource('/contacts', ContactController::class);
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contacts/store', [ContactController::class, 'store'])->name('contact.store');
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/contacts/index', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::post('/contacts/{}id/update', [ContactController::class, 'update'])->name('contact.update'); 
    Route::get('/contacts/{id}/destroy', [ContactController::class, 'destroy'])->name('contact.destroy');   
});


