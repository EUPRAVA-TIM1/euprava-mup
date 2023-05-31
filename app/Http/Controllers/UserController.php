<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class UserController extends Controller
{
    public function logout(Request $request): Application|Redirector|
    RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $request->session()->flush();
        return redirect('http://127.0.0.1:3000');
    }
}
