<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SMSController;
use App\Imports\DataImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Twilio\Rest\Client;

class HomeController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('index.index');
        }
        return view('auth.login');
    }

    public function sendSMS(Request $request){

        $sms = new SMSController();
        $sms->setLogin(getenv('ALTIRIA_EMAIL'));
        $sms->setPassword(getenv('ALTIRIA_PASSWORD'));
        $sms->setDebug(True);
        $sms->setEncoding('unicode');

        $msj = $request->input('mensaje');
        $filtro = $request->input('filtro');
        $option = $request->input('radioOption');

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(' ', '_',$filename);

            if($file->guessExtension() == 'xlsx'){
                // $file->move(public_path('storage/'), $filename);
                Excel::import(new DataImport, $request->file('file'));
            }
        }

        if(!empty($filtro)){
            $datos = DB::table('tbl_datos')->where('cargo', $filtro)->get();
        }else{
            $datos = DB::table('tbl_datos')->get();
        }

        if($option == 'Si'){
            for($i = 0; $i < count($datos); $i++){
                foreach($datos as $dato){
                    $nombre = $dato->nombres;
                    $apellido = $dato->apellidos;
                    $telefono = '57'.$dato->telefono;
                }
                $Nmsj = $nombre .' '. $apellido .' '. $msj;
                $sms->sendSMS($telefono, $Nmsj);
            }
        }else{
            for($i = 0; $i < count($datos); $i++){
                foreach($datos as $dato){
                    $telefono = '57'.$dato->telefono;
                }
                $sms->sendSMS($telefono, $msj);
            }
        }

        // $twiliosid    = getenv('TWILIO_SID'); 
        // $twilioToken  = getenv('TWILIO_TOKEN');
        // $twilio = new Client($twiliosid, $twilioToken); 
        
        // $message = $twilio->messages->create("whatsapp:+573106301469", // to 
        //             array("from" => "whatsapp:+14155238886","body" => $msj));
        
        //eliminacion de archivos
        //Storage::disk('public')->delete($filename);

        return redirect('/home')->with('success', 'Mensaje enviado con exito');
    }
}