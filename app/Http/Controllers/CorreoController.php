<?php

namespace App\Http\Controllers;

use App\Mail\CorreoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    public function enviar(){
    $subject = 'Esto es una prueba'; //Asunto del correo
    $contenido = 'Contenido específico del correo...'; // Contenido específico del correo
    $vista = 'correos.prueba'; // Nombre de la vista que deseas utilizar 

    $correo = new CorreoMailable($subject, $contenido, $vista);
    Mail::to('fcossio100@gmail.com')->send($correo);

    return "Correo enviado correctamente con la vista dinámica";
    }
}
