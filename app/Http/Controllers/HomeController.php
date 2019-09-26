<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (Auth::user()->tipo_usuario){
            case 'Jefe':
               return redirect()->action('JefeController@homej');
               break;
            case 'Revisor':
               return redirect()->action('RevisorController@homev');
               break;
            case 'Prestador':
               return redirect()->action('PrestadorController@homep');    
               break;
            case 'Auxiliar':
               return redirect()->action('ResponsableController@homes');
               break;          
            default:
        }


        return view('home');
    }
}
