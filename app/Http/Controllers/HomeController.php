<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
/*
    public function test() {
        $users = User::where('first_name', null)->get();
        foreach ($users as $user) {
            $user->first_name = 'Movil ';
            $user->last_name = ' ' . $user->identificator;
            $user->save();
        }
        return $users;
    }*/
}
