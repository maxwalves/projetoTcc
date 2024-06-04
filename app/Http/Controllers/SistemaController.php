<?php

namespace App\Http\Controllers;

use App\Models\User;

class SistemaController extends Controller
{
    public function sistema()
    {
        $user = auth()->user();
        return view('sistema.sistema', ['user'=> $user]);
    }
   
}
