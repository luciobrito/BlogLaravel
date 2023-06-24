<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControleUsuario extends Controller
{
    public function registro(Request $request){
        $incomingFields = $request -> validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'senha' => ['required', 'min:4']
        ]);
        return 'Olá do meu controller!';
    }
}
