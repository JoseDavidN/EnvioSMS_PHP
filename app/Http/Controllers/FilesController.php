<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataImport;

use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function show(){
        if(Auth::check()){
            return view('index.file');
        }
        return view('auth.login');
    }

    public function upload(Request $request){
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(' ', '_',$filename);

            if($file->guessExtension() == 'xlsx'){
                Excel::import(new DataImport, $request->file('file'));
            }
        }

        return redirect('/cargar')->with('success', "Archivo Cargado");
    }
}
