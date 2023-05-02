<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function vehicleRegistrationRequest(Request $request):
    Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $newVehicleRegistrationRequest = new Vehicle();

        $newVehicleRegistrationRequest->user_id = "1311001223445";

        $newVehicleRegistrationRequest->fill([
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'color' => $request->color,
            'engine_power' => $request->engine_power,
            'max_speed' => $request->max_speed,
            'num_of_seats' => $request->num_of_seats,
            'weight' => $request->weight,
            'vehicle_type' => $request->vehicle_type,
        ]);

        $newVehicleRegistrationRequest->save();

        return redirect('/');
    }

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('vehicleRegistrationRequests', ['vehicleRegistrationRequests' => Vehicle::all()]);
    }
}