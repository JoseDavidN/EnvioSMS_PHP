<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SMSController;
use App\Models\tbl_user;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('index.index');
        }
        return view('auth.login');
    }

    public function sendSMS(Request $request)
    {

        $sms = new SMSController();
        $sms->setLogin(getenv('ALTIRIA_EMAIL'));
        $sms->setPassword(getenv('ALTIRIA_PASSWORD'));
        $sms->setDebug(True);
        $sms->setEncoding('unicode');

        $msj = $request->input('mensaje');
        $filtro = $request->input('filtro');
        $option = $request->input('radioOption');
        $tipo = $request->input('tipo');
        
        $user = auth()->user()->username;

        if (!empty($filtro)) {
            $datos = DB::table('tbl_datos')->where('cargo', $filtro)->where('user', $user)->get();
            if (count($datos) == 0) {
                return redirect('/home')->withErrors('No has cargado ningun Archivo');
            }
        } else {
            $datos = DB::table('tbl_datos')->where('user', $user)->get();
            if (count($datos) == 0) {
                return redirect('/home')->withErrors('No has cargado ningun Archivo');
            }
        }

        if ($option == 'Si') {
            for ($i = 0; $i < count($datos); $i++) {
                foreach ($datos as $dato) {
                    $nombre = strtoupper($dato->nombres);
                    $apellido = strtoupper($dato->apellidos);
                    $telefono = '57' . $dato->telefono;
                }
                $Nmsj = $nombre . ' ' . $apellido . ' ' . $msj;

                if ($tipo == 'sms') {
                    $sms->sendSMS($telefono, $Nmsj);
                    return redirect('/home')->with('success', 'Mensaje enviado con exito');
                } else {
                    $twiliosid    = getenv('TWILIO_SID'); 
                    $twilioToken  = getenv('TWILIO_TOKEN');
                    $twilio = new Client($twiliosid, $twilioToken); 

                    $twilio->messages->create("whatsapp:+".$telefono, // to 
                                array("from" => "whatsapp:+14155238886","body" => $Nmsj));
                    return redirect('/home')->with('success', 'Mensaje enviado con exito');
                }
            }
        } else {
            for ($i = 0; $i < count($datos); $i++) {
                foreach ($datos as $dato) {
                    $telefono = '57' . $dato->telefono;
                }
                if ($tipo == 'sms') {
                    $sms->sendSMS($telefono, $msj);
                    return redirect('/home')->with('success', 'Mensaje enviado con exito');
                } else {
                    $twiliosid    = getenv('TWILIO_SID'); 
                    $twilioToken  = getenv('TWILIO_TOKEN');
                    $twilio = new Client($twiliosid, $twilioToken); 

                    $twilio->messages->create("whatsapp:+".$telefono, // to 
                                array("from" => "whatsapp:+14155238886","body" => $msj));
                    return redirect('/home')->with('success', 'Mensaje enviado con exito');
                }
            }
        }
        //return redirect('/home')->with('success', 'Mensaje enviado con exito');
    }
}
