<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        if(Auth::check()){
            return redirect(route('play', absolute: false));
        }
        return view('welcome');
        
        
    }

    public function game()
    {
        $user = Auth::user();
        return view('game', [
            'user'=>$user
        ]);
    }

    public function update_new_user()
    {
        $u = Auth::user();
        $id = $u->id;
        $user = User::find($id);
        $user->new_user = false;
        $user->save();

        return json_encode(["message" => "update"]);
    }
}
