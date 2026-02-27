<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AnnonceController;

// Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/', function () {
    return redirect()->route('annonces.index');
})->name('home');

// Annonces Routes
Route::resource('annonces', AnnonceController::class);

// Dashboard Route
Route::get('/dashboard', [AnnonceController::class, 'dashboard'])->name('dashboard');

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

// FILMS ROUTES 
// ==========================================

// Route::get('/films', function () {
//     $films = DB::table('films')->get();
//     return $films;
// });

// Route::get('/films/{id}', function ($id) {
//     $film = DB::table('films')->where('id', $id)->first();
//     return $film;
// });

// Route::get('/films/{id}/acteurs', function ($id) {
//     $acteurs = DB::table('participations')
//         ->join('acteurs', 'participations.acteur_id', '=', 'acteurs.id')
//         ->where('participations.film_id', $id)
//         ->select(
//             'acteurs.nom',
//             'acteurs.prenom',
//             'participations.role'
//         )
//         ->get();

//     return $acteurs;
// });
// // =============================
// // EXTRA PAGES ROUTES
// // =============================

// // Products
// Route::get('/products', function () {
//     return view('products.index');
// })->name('products.index');


// About
Route::get('/about', function () {
    return view('about');
})->name('about');

// Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
 ?>


