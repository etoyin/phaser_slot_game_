<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    //
    public function index()
    {
        // $user = Auth::user();
        
        // if($user && $user->hasVerifiedEmail()){
        //     redirect(route('verification.verify', absolute: false));
        // }

        // if($user){
            return view('welcome', [
                // 'user'=>$user
            ]);
        
        
    }

    public function game()
    {
        return view('game', [
            // 'user'=>$user
        ]);
    }
}
