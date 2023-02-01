<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        return view('home', compact('user_id', 'name', 'email'));
    }

    public function list()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('list', ['user' => $user]);
    }
}
