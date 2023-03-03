<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuotationController;

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

/*

Route::get('/quotation', function () {
    return view(('quotation.index'));
});
*/
//Route::get('/quotation/create', [QuotationController::class, 'create']);

//eliminar funcion ->middleware('auth') para quitar verificación de login
Route::resource('quotation', QuotationController::class)->middleware('auth');
Route::get('/', function () {
    return view('auth.login');
});



Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', [QuotationController::class, 'index'])->name('home');
Route::group(['middleware'=>'auth'], function (){
    Route::get('/', [QuotationController::class, 'index'])->name('home');
});
