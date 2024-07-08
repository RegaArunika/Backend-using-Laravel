<?php

use App\Http\Controllers\adminBrandController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\sepatuAdminController;

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

Route::get('/', function () { 
    return view('welcome');
});

Route::get('/landingpage', [HomeController::class, 'index'])->name('landingpage');
Route::get('/adminSepatu', [sepatuAdminController::class, 'index'])->name('admin');
Route::get('/brand',[adminBrandController::class,'index'])->name('admin');
Route::get('/notflix', [HomeController::class, 'notflix'])->name('notflix');

Route::get('/keranjang', [HomeController::class, 'keranjang'])->name('keranjang');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

//uts
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');


// Admin CRUD
Route::group(['middleware'=>'auth'], function() {
    Route::resource('produk', sepatuAdminController::class);
    Route::resource('toko',adminBrandController::class);

});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
