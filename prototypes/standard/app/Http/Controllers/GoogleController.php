<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callBack(){
        try {
            $google_User = Socialite::driver('google')->user();
            $user = User::where('google_id',$google_User->getId())->first();

            if(!$user){
                $new_user = User::create([
                    'name' => $google_User->getName(),
                    'email' => $google_User->getEmail(),
                    'google_id' => $google_User->getId(),
                ]);

                Auth::login($new_user);
                return redirect()->intended('dashboard');
                
            }else{
                Auth::login($user);
                return redirect()->intended('dashboard');
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd('something get wrong');
        }
    }
}
