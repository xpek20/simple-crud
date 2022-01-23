<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ClientCrud;
use App\Http\Livewire\PaymentCrud;
use App\Http\Livewire\Show;

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
    return view('dashboard');
});


Route::get('clients', ClientCrud::class);
Route::get('payments', PaymentCrud::class);
Route::post('/clients/search',[ClientCrud::class,'searchClient'])->name('client.search');
Route::get('clients/{id}',  Show::class)->name('show.client');
