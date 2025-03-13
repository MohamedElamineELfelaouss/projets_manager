<?php


use App\Http\Controllers\DeveloppeurController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\TacheController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('developpeur/devNoTach', [DeveloppeurController::class, 'developpeursSansTaches'])->name('developpeur.devNoTach');
Route::get('developpeur/tachBetweenDate', [DeveloppeurController::class, 'tachBetweenDate'])->name('developpeur.tachBetweenDate');

Route::resource('projets', ProjetController::class);
Route::resource('taches', TacheController::class)->parameters([
    'taches' => 'tache'
]);
Route::resource('developpeur', DeveloppeurController::class);
