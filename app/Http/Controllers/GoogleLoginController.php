<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleLoginController extends Controller
{
    public function googleLogin()
    {
        try{
            return Socialite::driver('google')->redirect();
        }catch(Exception $e){
            return back()->with('status', 'Error occurred! Try again later');
        }

    }

    public function googleCallBack()
    {
        try {
            $googleUserData = Socialite::driver('google')->user();
            $isExistingUser = User::where('google_id', $googleUserData->id)->first();
            if($isExistingUser){ #login as existing user
                Auth::login($isExistingUser);
                return redirect()->intended('dashboard');
            }else{ #register as new user
                $newUser = User::create([
                    'name' => $googleUserData->name,
                    'email' => $googleUserData->email,
                    'google_id' => $googleUserData->id,
                    // 'password' => 'mypassword'
                ]);
                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }

        } catch (\Throwable $e) {
            // dd($e->getMessage());
            return back()->with('status', 'Error occurred! Try again later');
        }
    }
}
