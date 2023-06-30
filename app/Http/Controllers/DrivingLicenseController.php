<?php

namespace App\Http\Controllers;

use App\Models\DrivingLicense;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DrivingLicenseController extends Controller
{
    public function drivingLicenseRequest(Request $request): View|RedirectResponse
    {
        $token = session()->pull('token', '');
        $authController = new AuthController();
        //$officialController = new OfficialController();
        //$drivingLicenseController = new DrivingLicenseController();

        $isValidToken = $authController->validateToken($token);
        $user = session()->pull('user', '');
        if ($isValidToken) {
            if ($user && isset($user['jmbg'])) {
                if(DrivingLicense::where('korisnik', $user['jmbg'])->first()){
                    return view('error');
                } else {
                    $newDrivingLicenseRequest = new DrivingLicense();

                    $newDrivingLicenseRequest->fill([
                        'brojVozackeDozvole' => substr(Str::uuid()->toString(), 0, 8),
                        'katergorijeVozila' => serialize($request->categories),
                        'datumIzdavanja' => null,
                        'datumIsteka' => null,
                        'brojKaznenihPoena' => 0,
                        'statusVozackeDozvole' => "U PROCESU IZDAVANJA",
                        'odobrioSluzbenik' => null,
                        'korisnik' => $user['jmbg']
                    ]);

                    $newDrivingLicenseRequest->save();

                    //return view('index', ['isOfficial' => $officialController->isOfficial(), 'token' => $token,
                        //'drivingLicenseData' => $drivingLicenseController->findByUserId($user['jmbg'])]);

                    return Redirect::back();
                }
            } else {
                return view('error');
            }
        } else {
            return view ('authorization_failed');
        }
    }

    public function renewDrivingLicenseRequest(Request $request): View|RedirectResponse
    {
        $token = session()->pull('token', '');

        $authController = new AuthController();
        $officialController = new OfficialController();
        $drivingLicenseController = new DrivingLicenseController();

        $isValidToken = $authController->validateToken($token);
        $user = session()->pull('user', '');

        if ($isValidToken) {

            if ($user && isset($user['jmbg'])) {

                $drivingLicense = DrivingLicense::where("korisnik", $user['jmbg'])->first();

                if (!$drivingLicense) {
                    return view('error');
                }

                if($drivingLicense->statusVozackeDozvole == "ODUZETA" ||
                    $drivingLicense->statusVozackeDozvole == "ODBIJENA") {

                    return view('error');

                } else {

                    $drivingLicense->katergorijeVozila = serialize($request->categories);
                    $drivingLicense->datumIzdavanja = Carbon::today();
                    $drivingLicense->datumIsteka = Carbon::today()->addYears(10);
                    $drivingLicense->save();

                    //return view('index', ['isOfficial' => $officialController->isOfficial(), 'token' => $token,
                       // 'drivingLicenseData' => $drivingLicenseController->findByUserId($user['jmbg'])]);

                    return Redirect::back();
                }

            } else {
                return view('error');
            }
        } else {
            return view ('authorization_failed');
        }
    }

    public function index(): JsonResponse
    {
        $drivingLicenses = DrivingLicense::all();

        return response()->json($drivingLicenses);
    }

    public function findByUserId($jmbg): JsonResponse
    {
        $drivingLicense = DrivingLicense::where('korisnik', $jmbg)->first();

        if (!$drivingLicense) {
            return response()->json(['error' => 'Vozacka dozvola nije pronadjena'], 404);
        }

        return response()->json($drivingLicense);
    }

    public function getPendingDriverLicenseRequests(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $token = session()->pull('token', '');
        $authController = new AuthController();
        $isValidToken = $authController->validateToken($token);

        if ($isValidToken) {
            $driverLicenseRequests = DrivingLicense::whereNull('odobrioSluzbenik')->
                orWhere('odobrioSluzbenik', '')->get();
            return view('driving_license_requests',
                ['driverLicenseRequests' => $driverLicenseRequests]);
        } else {
            return view('authorization_failed');
        }
    }

    public function manageDrivingLicenseRequest(Request $request, $id):
    View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $action = $request->input('action', '');

        $token = session()->pull('token', '');
        $authController = new AuthController();
        $isValidToken = $authController->validateToken($token);
        $user = session()->pull('user', '');

        if ($isValidToken) {
            $drivingLicense = DrivingLicense::find($id);
            if ($drivingLicense) {
                $drivingLicense->odobrioSluzbenik = $user['jmbg'];
                if ($action === 'approve') {
                    $drivingLicense->statusVozackeDozvole = "AKTIVNA";
                    $drivingLicense->datumIzdavanja = Carbon::today();
                    $drivingLicense->datumIsteka = Carbon::today()->addYears(10);
                } elseif ($action === 'reject') {
                    $drivingLicense->statusVozackeDozvole = "ODBIJENA";
                }

                $drivingLicense->save();

                return view('driving_license_requests',
                    ['driverLicenseRequests' => DrivingLicense::whereNull('odobrioSluzbenik')->
                    orWhere('odobrioSluzbenik', '')->get()]);
            } else {
                return view('error');
            }
        } else {
            return view('authorization_failed');
        }
    }

    public function removePenaltyPoints(Request $request, $jmbg): JsonResponse
    {

        //TODO Add auth

        $drivingLicense = DrivingLicense::where("korisnik", $jmbg)->first();

        $penaltyPoints = $request->oduzimanjeBodova;

        $drivingLicense->brojKaznenihPoena += $penaltyPoints;

        if($drivingLicense->brojKaznenihPoena >= 14 || $request->oduzimanjeVozacke) {
            $drivingLicense->statusVozackeDozvole = "ODUZETA";
        }

        $drivingLicense->save();

        return response()->json($drivingLicense);
    }
}
