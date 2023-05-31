<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function vehicleRegistrationRequest(Request $request):
    View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $token = session()->pull('token', '');
        $authController = new AuthController();
        $officialController = new OfficialController();
        $isValidToken = $authController->validateToken($token);
        $user = session()->pull('user', '');
        if ($isValidToken) {

            $newVehicleRegistrationRequest = new Vehicle();

            $newVehicleRegistrationRequest->user_id = $user['jmbg'];

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
                'is_approved' => false
            ]);

            $newVehicleRegistrationRequest->save();

            return view('index', ['isOfficial' => $officialController->isOfficial(), 'token' => $token]);
        } else {
            return view ('authorization_failed');
        }
    }

    /*public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $token = session()->pull('token', '');
        $authController = new AuthController();
        $isValidToken = $authController->validateToken($token);
        if ($isValidToken) {
            return view('vehicle_registration_requests', ['vehicleRegistrationRequests' => Vehicle::all()]);
        } else {
            return view ('authorization_failed');
        }
    }*/

    public function getPendingVehicleRegistrationRequests():
    View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $token = session()->pull('token', '');
        $authController = new AuthController();
        $isValidToken = $authController->validateToken($token);

        if ($isValidToken) {
            $vehicleRegistrationRequests = Vehicle::where('is_approved', false)->get();
            return view('vehicle_registration_requests',
                ['vehicleRegistrationRequests' => $vehicleRegistrationRequests]);
        } else {
            return view('authorization_failed');
        }
    }

    public function approveVehicleRegistrationRequest($id):
    View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $token = session()->pull('token', '');
        $authController = new AuthController();
        $isValidToken = $authController->validateToken($token);

        if ($isValidToken) {
            $vehicle = Vehicle::find($id);
            if ($vehicle) {
                $vehicle->is_approved = true;
                $vehicle->save();

                return view('vehicle_registration_requests',
                    ['vehicleRegistrationRequests' => Vehicle::where('is_approved', false)->get()]);
            } else {
                // Handle the case where the specified ID does not exist
                return view('error');
            }
        } else {
            return view('authorization_failed');
        }
    }

    public function index(): JsonResponse
    {
        $vehicles = Vehicle::all();

        return response()->json($vehicles);
    }

    public function findByUserId($jmbg): JsonResponse
    {
        $vehicle = Vehicle::where('user_id', $jmbg)->first();

        if (!$vehicle) {
            return response()->json(['error' => 'Vehicle not found'], 404);
        }

        return response()->json($vehicle);
    }
}
