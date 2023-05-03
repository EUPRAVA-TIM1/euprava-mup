<?php

//use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::post('/vehicleRegistrationRequest', [VehicleController::class, 'vehicleRegistrationRequest'])->
    name('vehicleRegistrationRequest');

Route::get('/getVehicleRegistrationRequests', [VehicleController::class, 'index'])->name('index');
//Auth::routes();

Route::get('/redirekcija/{token}', function ($token) {
    $authController = new AuthController();
    $isValidToken = $authController->validateToken($token);
    if ($isValidToken) {
        return view('index');
    } else {
        return view ('authorization_failed');
    }
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
