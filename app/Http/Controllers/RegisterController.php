<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\tbl_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show(){
        if(Auth::check()){
            return redirect('/home');
        }
        return view('auth.register');
    }

    public function register(RegisterRequest $request){
        $user = tbl_user::create($request->validated());
        return redirect('/login')->with('success', 'Tu registro ha sido exitoso');
    }
}
