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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/quotation', function () {
    return view(('quotation.index'));
});
*/
//Route::get('/quotation/create', [QuotationController::class, 'create']);
Route::resource('quotation', QuotationController::class);


