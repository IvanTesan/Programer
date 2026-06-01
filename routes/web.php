<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CourseController;

use App\Http\Controllers\AdminController;

Route::get('/', function () {
    $courses = \App\Models\Course::inRandomOrder()->limit(3)->get();
    return view('main', compact('courses'));
});

Route::get('/about', function () {
    return view('about');
});

// Rutas de Administración (deben ir ANTES que las rutas públicas con {product})
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/products/create', [CourseController::class, 'create'])->name('products.create');
    Route::post('/products', [CourseController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [CourseController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [CourseController::class, 'update'])->name('products.update');
    Route::patch('/products/{product}', [CourseController::class, 'update']);
    Route::delete('/products/{product}', [CourseController::class, 'destroy'])->name('products.destroy');
    Route::delete('products/{course}/files/{file}', [CourseController::class, 'destroyFile'])->name('products.files.destroy');
    Route::resource('admin/users', AdminController::class)->names([
        'index'   => 'admin.users.index',
        'create'  => 'admin.users.create',
        'store'   => 'admin.users.store',
        'edit'    => 'admin.users.edit',
        'update'  => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);
});

// Rutas Públicas de Cursos (después, para que {product} no capture "create")
Route::resource('products', CourseController::class)->only(['index']);

Route::middleware('auth')->group(function () {
    Route::resource('products', CourseController::class)->only(['show']);
});

Route::get('/list', function () {
    return view('list');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
