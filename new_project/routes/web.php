<?php	
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProductController;
Route::get('/etudiant/create', [EtudiantController::class, 'create']);
Route::post('/etudiant/store', [EtudiantController::class, 'store']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store']);
 ?>