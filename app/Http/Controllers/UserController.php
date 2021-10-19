<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Tweet;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profil($id){
        $User = User::where('id', $id)->first();
        $Tweets = Tweet::with('user')->orderBy('id', 'desc')->where('user_id', $id)->get();

        return Inertia::render('Profil-User', [
            "tweets" => $Tweets,
            "user" => $User
        ]);
    }
}
