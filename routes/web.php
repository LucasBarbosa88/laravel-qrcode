<?php

use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\UserController;
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

Route::get('/', [QrCodeController::class, 'generate'])->name('generate');
Route::get('/user/{NAME}', [QrCodeController::class, 'qrCode'])->name('userQrCode');
Route::get('/{NAME}', [UserController::class, 'userDetails'])->name('userDetails');