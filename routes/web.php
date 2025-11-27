<?php

use App\Http\Controllers\CicleController;
use App\Http\Controllers\InstitutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Ruta para mostrar vista de detalle del ciclo
    Route::get('/cicles/{id}', [CicleController::class, 'show'])->name('mostrarCicles');

    //Ruta para matricular a alumno del ciclo TODO!!!!
    Route::post('/cicles/matricular/{id}', [CicleController::class, 'matricular'])->name('matricula');

    //Ruta para crear un ciclo (tiene middleware)
    Route::get('/cicle/create', [CicleController::class, 'create'])->name('createCicle')->middleware('admin');

    //Ruta para guardar un ciclo despues de crearlo
    Route::post('/cicle/store', [CicleController::class, 'store'])->name('guardarCicle')->middleware('admin');

    //Ruta para actualizar los datos de un ciclo
    Route::put('/cicle/update/{id}', [CicleController::class, 'update'])->name('updateCicle')->middleware('admin');

    //Ruta que lleva a la vista de editar ciclo
    Route::get('/cicle/edit/{id}', [CicleController::class, 'edit'])->name('editCicle')->middleware('admin');

    Route::get('/cicle/destroy/{id}', [CicleController::class, 'destroy'])->name('eliminarCicle')->middleware('admin');

    Route::get('/cicle/matricular/{id}', [CicleController::class, 'matricular'])->name('matricularCicle');

    Route::get('/students', [InstitutController::class, 'index'])->name('index');

    Route::put('/update/{id}', [InstitutController::class, 'update'])->name('update')->middleware('admin');

    Route::get('/edit/{id}', [InstitutController::class, 'edit'])->name('edit')->middleware('admin');

    Route::get('/destroy/{id}', [InstitutController::class, 'destroy'])->name('destroy')->middleware('admin');
    
    Route::get('/show/{id}', [InstitutController::class, 'show'])->name('show');
});

require __DIR__ . '/auth.php';
