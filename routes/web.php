<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MahasiswaController::class, 'index']);
Route::get('/tambah-data', [MahasiswaController::class, 'create']);
Route::post('/simpan-data', [MahasiswaController::class, 'store']);
Route::get('/edit/{id}', [MahasiswaController::class, 'edit']);
Route::put('/update/{id}', [MahasiswaController::class, 'update']);
Route::delete('/delete/{id}', [MahasiswaController::class, 'delete']);
