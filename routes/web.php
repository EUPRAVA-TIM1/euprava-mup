<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DrivingLicenseController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::post('/vehicleRegistrationRequest', [VehicleController::class, 'vehicleRegistrationRequest'])->
    name('vehicleRegistrationRequest');

Route::post('/driverLicenseRequest', [DrivingLicenseController::class, 'driverLicenseRequest'])->
    name('driverLicenseRequest');

Route::get('/getVehicleRegistrationRequests', [VehicleController::class, 'getPendingVehicleRegistrationRequests'])
    ->name('getPendingVehicleRegistrationRequests');

Route::get('/redirekcija/{token}', function ($token) {
    $authController = new AuthController();
    $officialController = new OfficialController();
    $drivingLicenseController = new DrivingLicenseController();

    $isValidToken = $authController->validateToken($token);
    $user = session()->get('user', '');

    if ($isValidToken) {
        return view('index', ['isOfficial' => $officialController->isOfficial(), 'token' => $token,
            'drivingLicenseData' => $drivingLicenseController->findByUserId($user['jmbg'])]);
    } else {
        return view ('authorization_failed');
    }
});

Route::get('/official/{token}', function ($token) {
    $authController = new AuthController();
    $officialController = new OfficialController();
    $isValidToken = $authController->validateToken($token);
    if($isValidToken && $officialController->isOfficial()) {
        return view('official_index', ['isOfficial' => true, 'token' => $token]);
    } else {
        return view ('authorization_failed');
    }
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/manageVehicleRegistrationRequest/{id}', [VehicleController::class,
    'manageVehicleRegistrationRequest'])->name('manageVehicleRegistrationRequest');

Route::get('/getDriverLicenseRequests', [DrivingLicenseController::class, 'getPendingDriverLicenseRequests'])
    ->name('getPendingDriverLicenseRequests');

Route::post('/manageDrivingLicenseRequest/{id}', [DrivingLicenseController::class, 'manageDrivingLicenseRequest'])
    ->name('manageDrivingLicenseRequest');

Route::get('/myVehicles', [VehicleController::class, 'findByUserId'])->name('findByUserId');
