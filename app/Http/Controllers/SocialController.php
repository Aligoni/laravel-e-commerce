<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Validator;
use Socialite;
use Exception;
use Auth;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook(Request $request)
    {
        try {
    
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('facebook_id', $user->id)->first();
     
            if($isUser){
                Auth::login($isUser);
                return redirect('/')->with('message', 'Login Successful');
            }else{
                $isUser = User::where('email', $user->email)->first();
                if ($isUser) {
                    $isUser->facebook_id = $user->id;
                    $isUser->save();

                    Auth::login($isUser);
                    return redirect('/')->with('message', 'Login Successful');
                }

                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,

                    //Only customers can login with social media accounts
                    'role' => 'CUSTOMER',

                    // We use a blank password as user won't be able to create
                    // account with a blank password
                    'password' => Hash::make('')
                ]);
    
                Auth::login($createUser);
                return redirect('/')->with('message', 'Registration Successful');
            }
    
        } catch (Exception $exception) {
            return redirect('/login')->with('warning', 'Something went wrong, Please try again later');
        }
    }
}