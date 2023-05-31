<?php

namespace App\Http\Controllers;

use App\Models\DrivingLicense;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DrivingLicenseController extends Controller
{
    public function driverLicenseRequest(Request $request):
    \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        $token = session()->pull('token', '');
        $authController = new AuthController();
        $officialController = new OfficialController();
        $isValidToken = $authController->validateToken($token);
        $user = session()->pull('user', '');
        if ($isValidToken) {
            if ($user && isset($user['jmbg'])) {
                if(DrivingLicense::where('user_id', $user['jmbg'])->first()){
                    return view('error');
                } else {
                    $newDrivingLicenseRequest = new DrivingLicense();

                    $newDrivingLicenseRequest->user_id = $user['jmbg'];

                    $newDrivingLicenseRequest->fill([
                        'driver_license_num' => substr(Str::uuid()->toString(), 0, 8),
                        'categories' => serialize($request->categories),
                        'issue_date' => null,
                        'expiry_date' => null,
                        'penalty_points' => 0,
                        'status' => "U PROCESU IZDAVANJA",
                        'official_id' => null,
                    ]);

                    $newDrivingLicenseRequest->save();

                    return view('index', ['isOfficial' => $officialController->isOfficial(), 'token' => $token]);
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
        $drivingLicense = DrivingLicense::where('user_id', $jmbg)->first();

        if (!$drivingLicense) {
            return response()->json(['error' => 'Driving license not found'], 404);
        }

        return response()->json($drivingLicense);
    }
}
