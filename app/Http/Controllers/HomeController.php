<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
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
        $transactions = Transaction::query()
        ->where('sender_id','=',Auth::user()->id)
        ->orWhere('receiver_id','=',Auth::user()->id)
        ->get();

        return view('index')->with('transactions', $transactions)
        -> with('users', User::all());
    }
}
