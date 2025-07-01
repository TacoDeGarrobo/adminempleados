<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('empleados', App\Http\Controllers\EmpleadoController::class)->middleware('auth');
Route::resource('departamentos', App\Http\Controllers\DepartamentoController::class)->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/create', [EmpleadoController::class, 'create']);
    Route::post('/create', [EmpleadoController::class, 'store']) ->name('create');
    Route::get('/edit/{id}', [EmpleadoController::class, 'edit']);
    Route::put('/edit/{id}', [EmpleadoController::class, 'update']) ->name('edit');
    Route::delete('/delete/{id}', [EmpleadoController::class, 'destroy']) ->name('delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/departamentos', [DepartamentoController::class, 'index'])->name('departamento.department');
    Route::get('/departamento/create', [DepartamentoController::class, 'create']);
    Route::post('/departamento/create', [DepartamentoController::class, 'store']) ->name('departamento.createDepartment');
    Route::get('/departamento/edit/{id}', [DepartamentoController::class, 'edit '])->name ('departamento.editDepartment');
    Route::put('/departamento/edit/{id}', [DepartamentoController::class, 'update ']) ->name('departamento.editDepartment');
});

require __DIR__.'/auth.php';
