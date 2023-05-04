<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function validateToken($token): bool
    {
        $ssoHost = env('SSO_HOST');
        $ssoPort = env('SSO_PORT');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://' . $ssoHost . ':' . $ssoPort . '/sso/Whoami');

        if ($response->status() == 200) {
            $data = $response->json();
            session(['token' => $token]);
            session(['user' => $data]);
            return true;
        } else {
            $errorMessage = $response->body();
            return false;
        }
    }
}
