<?php

use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/", function () {
    return "Ok";
});

Route::post('/verify', [VerificationController::class, 'verify']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/divisions', [CategoryController::class, 'divisions']);
Route::get('/districts', [CategoryController::class, 'districts']);
Route::get('/upazillas', [CategoryController::class, 'upazillas']);
Route::get('/vaccination-centers', [CategoryController::class, 'vaccinationCenters']);
