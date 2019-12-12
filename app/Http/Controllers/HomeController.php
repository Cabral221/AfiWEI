<?php

namespace App\Http\Controllers;

use App\Model\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rooms = Room::all();
        return view('home',compact('rooms'));
    }

    public function welcome()
    {
        $rooms = Room::with('students')->get();
        return view('welcome',compact('rooms'));
    }

    public function sector()
    {
        return view('sector.sector');
    }

    public function niveau()
    {
        return view('niveau');
    }
}
