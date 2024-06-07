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
Route::get('/stock',[GestionEmp::class,'stockhome'])->name('stockhome'); //Page acceuil
Route::get('/stockDetailed',[GestionEmp::class,'stockSecondary'])->name('stockdetailed'); //Page detaillee
Route::get('generalstockview',[GestionEmp::class,'generalStockView']); //Donnee datatable acceuil
Route::get('detailedstockview',[GestionEmp::class,'detailedStockView']);//Donnee datatable detaillee

//Routes de la page articles en stock
Route::get('/articlestock',[GestionEmp::class,'articlesHome'])->name('articlesHome'); //Page acceuil
Route::get('articledata',[GestionEmp::class,'articledata']); //Donnee Datatable
Route::get('/articlemodal/{id}',[GestionEmp::class,'assignmodal']); //Modal du boutton assigner
Route::get('/articleassign',[GestionEmp::class,'assign'])->name('articleassign'); //Soumission info assign
Route::get('/autocomplete',[GestionEmp::class,'autocompletename'])->name('autocompletename'); //Autocomplete emplacement

//Routes de la page saisie de stock entrant
Route::get('/saisie',[GestionEmp::class,'saisieHome'])->name('saisiehome'); //Page acceuil
Route::get('/modalType',[GestionEmp::class,'modalType'])->name('modalType'); //Injection modal Ajouter type
Route::get('/modalMarque',[GestionEmp::class,'modalMarque'])->name('modalMarque');//Injectioon modal Ajouter type
