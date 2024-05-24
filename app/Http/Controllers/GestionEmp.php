<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestionEmp extends Controller
{
    public function articlesHome(){
        return view('articlestock');
    }
}
