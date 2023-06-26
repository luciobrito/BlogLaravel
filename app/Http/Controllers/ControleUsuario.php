<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ControleUsuario extends Controller
{
    public function login(Request $request){
        $incomingFields = $request -> validate([
            'loginemail' => 'required',
            'loginpassword' => 'required'
        ]);
        if(auth()->attempt(['email' => $incomingFields['loginemail'],'password' => $incomingFields['loginpassword']])){
            $request->session()->regenerate();
        }
        return redirect('/home');
    }
    public function logout(){
        auth()->logout();
        return redirect('/home');
    }
    public function registro(Request $request){
        $incomingFields = $request -> validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => ['required', 'min:4']
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()-> login($user);
        return redirect('/home');
    }
}
