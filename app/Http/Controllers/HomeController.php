<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Info;
use App\Models\Works;
class HomeController extends Controller
{

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
        $infos=Info::all();
        $works=Works::orderBy('id','DESC')->paginate(3);
        return view('home',compact('infos','works'));
    }

}
