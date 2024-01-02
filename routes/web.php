<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarsController;
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

Route::get('/', function () {
    return view('user.home');
});

Route::get('/logowanie', function () {
   return view('auth.login');
});

Route::get('/rejestracja', function () {
    return view('auth.register');
});

Route::get('/samochody', [CarsController::class, 'index'])->name('cars');

//authentication
Route::get('/konto',[AuthController::class, 'account'])->name('account');
Route::post('/rejestracja/utwórz', [AuthController::class, 'register'])->name('register');
Route::get('/logowanie/zaloguj', [AuthController::class, 'login'])->name('login');
Route::post('/konto/aktualizacja', [AuthController::class, 'update'])->name('account.update');
Route::post('/wyloguj', [AuthController::class, 'logout'])->name('logout');


//Admin
Route::get('/admin', function(){
    return view('admin.home');
});

Route::get('/admin/samochody', [CarsController::class, 'index'])->name('carsList');;
Route::get('admin/samochody/dodawanie', [CarsController::class, 'create'])->name('admin.create.car');
Route::get('admin/samochody/marki', [CarsController::class, 'brands'])->name('admin.create.brand');
Route::post('admin/samochody/marki/dodaj', [CarsController::class, 'storeBrand'])->name('admin.store.brand');
Route::delete('admin/samochody/marki/usun/{id}', [CarsController::class, 'deleteBrand'])->name('admin.delete.brand');
Route::post('admin/samochody/samochody/dodaj', [CarsController::class, 'storeCar'])->name('admin.car.store.brand');


