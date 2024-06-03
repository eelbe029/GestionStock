<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionEmp;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Routes de la page stock
Route::get('/stock',[GestionEmp::class,'stockhome'])->name('stockhome');
Route::get('/stockDetailed',[GestionEmp::class,'stockSecondary'])->name('stockdetailed');
Route::get('generalstockview',[GestionEmp::class,'generalStockView']);
Route::get('detailedstockview',[GestionEmp::class,'detailedStockView']);

//Routes de la page articles en stock
Route::get('/articlestock',[GestionEmp::class,'articlesHome'])->name('articlesHome');
Route::get('articledata',[GestionEmp::class,'articledata']);
Route::get('/articlemodal/{id}',[GestionEmp::class,'assignmodal']);
Route::get('/articleassign',[GestionEmp::class,'assign'])->name('articleassign');

