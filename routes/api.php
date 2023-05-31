<?php

use App\Http\Controllers\DrivingLicenseController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\VehicleController;
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

Route::group(['prefix' => 'officials'], function () {
    Route::post('/', [OfficialController::class, 'store'])->name('store');
});

Route::group(['prefix' => 'vehicles'], function () {
    Route::get('/', [VehicleController::class, 'index'])->name('index');
    Route::get('/{regBroj}', [VehicleController::class, 'findByVehicleRegNum'])->name('findByVehicleRegNum');
});

Route::group(['prefix' => 'driving_licenses'], function () {
    Route::get('/', [DrivingLicenseController::class, 'index'])->name('index');
    Route::get('/{jmbg}', [DrivingLicenseController::class, 'findByUserId'])->name('findByUserId');
    Route::post('/{jmbg}', [DrivingLicenseController::class, 'removePenaltyPoints'])->name('removePenaltyPoints');
});


