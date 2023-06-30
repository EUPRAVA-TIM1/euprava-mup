<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class VehicleController extends Controller
{
    public function vehicleRegistrationRequest(Request $request): View|RedirectResponse
    {
        $token = session()->pull('token', '');
        $authController = new AuthController();
        $isValidToken = $authController->validateToken($token);

        $user = session()->pull('user', '');
        if ($isValidToken) {

            $newVehicleRegistrationRequest = new Vehicle();

            $newVehicleRegistrationRequest->fill([
                'marka' => $request->brand,
                'model' => $request->model,
                'godina' => $request->year,
                'boja' => $request->color,
                'regBroj' => $request->registration_number,
                'snagaMotora' => $request->engine_power,
                'maksimalnaBrzina' => $request->max_speed,
                'brojSedista' => $request->num_of_seats,
                'tezina' => $request->weight,
                'tipVozila' => $request->vehicle_type,
                'statusRegistracije' => "NA_CEKANJU",
                'prijavljenaKradja' => null,
                'odobrioSluzbenik' => null,
                'korisnik' => $user['jmbg']
            ]);

            $newVehicleRegistrationRequest->save();

            return Redirect::back();
        } else {
            return view ('authorization_failed');
        }
    }

    public function getPendingVehicleRegistrationRequests():
    View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $token = session()->pull('token', '');
        $authController = new AuthController();
        $isValidToken = $authController->validateToken($token);

        if ($isValidToken) {
            $vehicleRegistrationRequests = Vehicle::whereNull('odobrioSluzbenik')->orWhere('odobrioSluzbenik', '')
                ->get();
            return view('vehicle_registration_requests',
                ['vehiclesRegistration' => $vehicleRegistrationRequests, 'isOfficial' => true]);
        } else {
            return view('authorization_failed');
        }
    }

    public function manageVehicleRegistrationRequest(Request $request, $id):
    View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $action = $request->input('action', '');

        $token = session()->pull('token', '');
        $authController = new AuthController();
        $isValidToken = $authController->validateToken($token);
        $user = session()->pull('user', '');

        if ($isValidToken) {
            $vehicle = Vehicle::find($id);
            if ($vehicle) {
                $vehicle->odobrioSluzbenik = $user['jmbg'];

                if ($action === 'approve') {
                    $vehicle->statusRegistracije = "ODOBRENA";
                } elseif ($action === 'reject') {
                    $vehicle->statusRegistracije = "ODBIJENA";
                }

                $vehicle->save();

                return view('vehicle_registration_requests',
                    ['vehiclesRegistration' => Vehicle::whereNull('odobrioSluzbenik')->
                        orWhere('odobrioSluzbenik', '')->get(), 'isOfficial' => true]);
            } else {
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

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function findByUserId():
    View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        $token = session()->pull('token', '');
        $authController = new AuthController();
        $isValidToken = $authController->validateToken($token);
        $user = session()->get('user', '');

        if ($isValidToken) {
            $vehicles = Vehicle::where('korisnik', $user['jmbg'])->get();
            return view('vehicle_registration_requests',
                ['vehiclesRegistration' => $vehicles, 'isOfficial' => false]);
        } else {
            return view('authorization_failed');
        }
    }

    public function findByVehicleRegNum($regBroj): JsonResponse
    {
        $vehicle = Vehicle::where('regBroj', $regBroj)->first();

        if (!$vehicle) {
            return response()->json(['error' => 'Vozilo nije pronadjeno!'], 404);
        }

        return response()->json($vehicle);
    }

    public function reportVehicleTheft(Request $request): JsonResponse
    {
        $vehicle = Vehicle::where("regBroj", $request->regBroj)->first();

        if (!$vehicle) {
            return response()->json(['error' => 'Vozilo nije pronadjeno!'], 404);
        } else {

            if($request->korisnik == $vehicle->korisnik) {
                return response()->json(['error' => 'Nije moguce prijaviti vozilo!'], 403);
            } else { //if already is reported, prevent it!

                if(!isset($vehicle->prijavljenaKradja)) {
                    $vehicle->prijavljenaKradja = Carbon::today()->setTime(
                        Carbon::now()->hour,
                        Carbon::now()->minute,
                        Carbon::now()->second
                    );

                    $vehicle->save();
                } else {
                    return response()->json(['error' => 'Vozilo je vec prijavljeno!'], 403);
                }

            }

            return response()->json(['message' => 'Vozilo je uspesno prijavljeno!']);
        }
    }
}
