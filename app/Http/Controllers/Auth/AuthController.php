<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function redirect()
    {

        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {

        $userGoogle = Socialite::driver('google')->user();


        if ($user = User::where('google_id', $userGoogle->id)->first()) {
            Auth::login($user);
            return redirect()->route('posts.index');
        } else {
            //$fecha = Carbon::now();
            $user = User::updateOrCreate([
                'google_id' => $userGoogle->id,
            ], [
                'name' => $userGoogle->name,
                'email' => $userGoogle->email,
                //'email_verified_at' => $fecha,
                'google_token' => $userGoogle->token,
            ]);
            Auth::login($user);
            return redirect()->route('posts.index');
        }
    }
}
