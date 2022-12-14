<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('users');
// });

// Route::get('/', [UserController::class, "Showusers"]);
// Route::post('/submit-form', [UserController::class, "ShowajaxData"]);

Route::get('/', [UserController::class, "Showusers"]);
Route::post('/submit-form', [UserController::class, "ShowajaxData"]);
Route::post('/export-data', [UserController::class, "ExportajaxData"]);

Route::get('export', [UserController::class, "ExportData"]);


