<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Departamentos;
use App\Ciudades;
use App\Http\Requests;

class HomeController
{
    public function index()
    {
        $user = \Auth::user();
        $departamentos = Departamentos::where('id_pais',1)->get();
        return view('home', compact('user','departamentos'));
    }

        public function departamentos($id)
    {
       
       $ciudades=Ciudades::where('id_departamento','=',$id)->get();
      //$prospecto=User::all();
        return response ()->json($ciudades);
      
          }
}
