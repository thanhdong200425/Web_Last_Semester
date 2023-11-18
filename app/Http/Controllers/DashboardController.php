<?php

namespace App\Http\Controllers;

use App\Models\Albumn;
use App\Models\Singer;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $albumnQuantity = Albumn::count();
        $singerQuantity = Singer::count();
        $songQuantity = Song::count();
        $userQuantity = User::count();
        $singersList = Singer::paginate(5);
        return view('pages.dashboard')->with([
            'albumnQuantity' => $albumnQuantity,
            'singerQuantity' => $singerQuantity,
            'songQuantity' => $songQuantity,
            'userQuantity' => $userQuantity,
            'singersList' => $singersList,
        ]);
    }
}
