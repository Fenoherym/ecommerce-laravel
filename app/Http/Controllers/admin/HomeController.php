<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Models\User;
use App\Models\Visiteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }
        $users = User::where('role_id', 2)->get();
        $sessions = Session::all();
        $visiteurs = Visiteur::all();
        $nbr_janvier = Visiteur::where('month', "01")->get()->count();
        $nbr_fevrier = Visiteur::where('month', "02")->get()->count();
        $nbr_mars = Visiteur::where('month', "03")->get()->count();
        $nbr_avril = Visiteur::where('month', "04")->get()->count();
        $nbr_mai = Visiteur::where('month', "05")->get()->count();
        $nbr_juin = Visiteur::where('month', "06")->get()->count();
        $nbr_juillet = Visiteur::where('month', "07")->get()->count();
        $nbr_aout = Visiteur::where('month', "08")->get()->count();
        $nbr_septembre = Visiteur::where('month', "09")->get()->count();
        $nbr_octobre = Visiteur::where('month', "10")->get()->count();
        $nbr_novembre = Visiteur::where('month', "11")->get()->count();
        $nbr_decembre = Visiteur::where('month', "12")->get()->count();
        return view('admin.home', [
            'sessions' => $sessions,
            'users' => $users,
            'visiteurs' => $visiteurs,
            'nbr_janvier' => $nbr_janvier,
            'nbr_fevrier' => $nbr_fevrier,
            'nbr_mars' => $nbr_mars,
            'nbr_avril' => $nbr_avril,
            'nbr_mai' => $nbr_mai,
            'nbr_juin' => $nbr_juin,
            'nbr_juillet' => $nbr_juillet,
            'nbr_aout' => $nbr_aout,
            'nbr_septembre' => $nbr_septembre,
            'nbr_octobre' => $nbr_octobre,
            'nbr_novembre' => $nbr_novembre,
            'nbr_decembre' => $nbr_decembre,
        ]);

    }
}
