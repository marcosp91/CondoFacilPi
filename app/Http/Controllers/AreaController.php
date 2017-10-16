<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaController extends Controller
{

	 public function areaComum() 
    {
        return view('dashboard.cadastro.areaComum');
    }

   	public function reservarAreaComum() 
    {
        return view('dashboard.cadastro.reservaArea');
    }
    
    
}
