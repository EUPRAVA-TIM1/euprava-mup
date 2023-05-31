<?php

namespace App\Http\Controllers;

use App\Models\Official;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OfficialController extends Controller
{
    public function store(): JsonResponse
    {
        $sluzbenik = new Official();
        $sluzbenik ->sluzbenik = "3109975763002";

        $sluzbenik->save();

        return response()->json([
            'message' => "Official je uspesno kreiran",
            'data' => $sluzbenik
        ], 201);
    }


    public function isOfficial(): bool
    {
        $user = session()->pull('user', '');

        if ($user && isset($user['jmbg'])) {
            return Official::where('sluzbenik', $user['jmbg'])->exists();
        }

        return false;
    }
}
