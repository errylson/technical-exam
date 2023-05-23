<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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

Route::get('/', function() {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate']);

Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/employees', [EmployeeController::class, 'index']);
    Route::post('/employees/store', [EmployeeController::class, 'store']);
    Route::put('/employees/{id}/update', [EmployeeController::class, 'update']);
    Route::delete('/employees/{id}/delete', [EmployeeController::class, 'delete']);

    Route::get('/companies', [CompanyController::class, 'index']);
    Route::post('/companies/store', [CompanyController::class, 'store']);
    Route::put('/companies/{id}/update', [CompanyController::class, 'update']);
    Route::delete('/companies/{id}/delete', [CompanyController::class, 'delete']);

});
