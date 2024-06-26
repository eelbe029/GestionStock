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

//Page dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('graphdisp',[GestionEmp::class,'graphdisp'])->name('graphdisp');

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
Route::get('/historique/{id}',[GestionEmp::class,'histdata'])->name('histdata');

//Routes de la page articles sortis du stock
Route::get('/articlesorti',[GestionEmp::class,'articleSortiHome'])->name('articleSortiHome'); //Page acceuil
Route::get('/articlesortidata',[GestionEmp::class,'articleSortiData']); //Donnee Datatable
Route::get('/dissocier/{id}',[GestionEmp::class,'dissocier'])->name('dissocier'); //Boutton dissocier

//Routes de la page saisie de stock entrant
Route::get('/saisie',[GestionEmp::class,'saisieHome'])->name('saisiehome'); //Page acceuil
Route::get('/modalType',[GestionEmp::class,'modalType'])->name('modalType'); //Injection modal Ajouter type
Route::get('/modalMarque',[GestionEmp::class,'modalMarque'])->name('modalMarque');//Injectioon modal Ajouter type
Route::get('/nouveauType',[GestionEmp::class,'nouveauType'])->name('nouveauType'); //Saisie d'un nouveau type
Route::get('/nouvelleMarque',[GestionEmp::class,'nouvelleMarque'])->name('nouvelleMarque'); //Saisie d'une  nouvelle marque
Route::get('/champsaisie/{val}',[GestionEmp::class,'champsaisie']);//Injection champ d'entreer
Route::get('/saisieEntree',[GestionEmp::class,'saisieEntree'])->name('saisieEntree'); //Saisie entree



