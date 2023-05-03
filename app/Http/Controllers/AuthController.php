<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            // Successful request
            $data = $response->json();
            return true;
        } else {
            // Failed request
            $errorMessage = $response->body();
            return false;
        }
    }
}
