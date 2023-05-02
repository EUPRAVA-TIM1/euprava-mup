<?php

//use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/vehicleRegistrationRequest', [VehicleController::class, 'vehicleRegistrationRequest'])->
    name('vehicleRegistrationRequest');

Route::get('/getVehicleRegistrationRequests', [VehicleController::class, 'index'])->name('index');
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
