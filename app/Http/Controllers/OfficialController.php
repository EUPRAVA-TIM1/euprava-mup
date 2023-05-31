<?php

namespace App\Http\Controllers;

use App\Models\Official;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OfficialController extends Controller
{
    public function store(): JsonResponse
    {
        $official = new Official();
        $official->official_id = "3109975763002";

        $official->save();

        return response()->json([
            'message' => "Officials successfully added!",
            'data' => $official
        ], 201);
    }


    public function isOfficial(): bool
    {
        $user = session()->pull('user', '');

        if ($user && isset($user['jmbg'])) {
            return Official::where('official_id', $user['jmbg'])->exists();
        }

        return false;
    }
}
