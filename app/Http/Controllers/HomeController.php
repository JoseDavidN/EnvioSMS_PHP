<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('index.index');
        }
        return view('auth.login');
    }

    public function sendSMS(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $message = $request->input('mensaje');
        $option = $request->input('radioOption');

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(' ', '_',$filename);

            if($file->guessExtension() == 'xlsx'){
                $file->move(public_path('storage/'), $filename);
            }
        }

        $rute = Storage::url($filename);

        //eliminacion de archivos
        //Storage::disk('public')->delete($filename);

        return(dd($rute));
        //return redirect('/home')->with('success', 'Mensaje enviado con exito');
    }
}
