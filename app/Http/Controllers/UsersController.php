<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transaction;

class UsersController extends Controller
{
    public function index() {
        // 
    }

    public function createUser(Request $request) {
        $this -> validate($request, [
            'name' => 'required | max:120',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:6'
        ]);

        $user = new User();
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = bcrypt($request -> password);

        $transaction = new Transaction();
        $transaction -> value = 1000;
        $transaction -> comment = 'Initial deposit';
        $transaction -> currency_id = 1;
        $transaction -> sender_id = 1;
        $transaction -> receiver_id = 1;
        // dd($request -> all());

        // $user = User::create([
        //     'name' => $request -> name,
        //     'email' => $request -> email,
        //     'password' => bcrypt($request -> password)
        //  ]);
        //  $transaction = Transaction::create([
        //     'value' => 1000,
        //     'comment' => 'Initial deposit',
        //     'currency_id' => 1,
        //     'sender_id' => 1,
        //     'receiver_id' => 1
        // ]);

        // dd($request -> $user);

        $user -> save();
        $transaction -> save();

        Auth::login($user);

        return redirect() -> route('dashboard');
    }

    public function signInUser(Request $request) {
        $this -> validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new User();
        // if(Auth::attempt([$user -> email = $request -> email, $user -> password = $request -> password])) {
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect() -> route('dashboard');
        }
        return redirect() -> back();
    }

    public function userLogout() {
        Auth::logout();
        return redirect() -> route('/');
    }
}
