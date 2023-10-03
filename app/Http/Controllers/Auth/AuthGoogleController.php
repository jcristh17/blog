<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthGoogleController extends Controller
{
    public function setPasswordIndex()
    {
            return view('auth.set-password-google-auth');
    }
    public function setPasswordUser(Request $request, User $user)
    {
        $request->validate(
            [
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
            ]
        );
        //$user = User::find($user);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('posts.index');
    }
}
