<?php

namespace App\Http\Controllers;

use App\Models\tbl_dato;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(){
        Session::flush();

        Auth::logout();

        tbl_dato::query()->delete();

        return redirect()->to('/login');
    }
}
