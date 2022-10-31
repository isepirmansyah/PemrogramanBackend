<?php

use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/animals', [AnimalsController::class, 'index']);
Route::post('/animals/store', [AnimalsController::class, 'store']);
Route::put('/animals/update/{id}', [AnimalsController::class, 'update']);
Route::delete('/animals/delete/{id}', [AnimalsController::class, 'destroy']);

Route::get('/student', [StudentController::class, 'index']);
Route::post('/student/store', [StudentController::class, 'store']);
Route::put('/student/update/{id}', [StudentController::class, 'update']);
Route::delete('/student/delete/{id}', [StudentController::class, 'destroy']);
