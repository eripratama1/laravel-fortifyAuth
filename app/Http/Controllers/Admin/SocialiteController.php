<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function google_callback()
    {
        try {
     
            $user = Socialite::driver('google')->stateless()->user();
 
            /// lakukan pengecekan apakah google id nya sudah ada apa belum
            $isUser = User::where('google_id', $user->id)->first();
             
            /// jika sudah ada, langsung login
            if($isUser){
                 
                Auth::login($isUser);
                return redirect('/admin/dashboard');
 
            } else { /// jika belum ada, register baru
 
                $createUser = new User;
                $createUser->name =  $user->getName();
                $createUser->username =  $user->getName();
 
               
                if($user->getEmail() != null){
                    $createUser->email = $user->getEmail();
                    $createUser->email_verified_at = \Carbon\Carbon::now();
                }  
                 
                /// tambahkan google id
                $createUser->google_id = $user->getId();
 
                /// membuat random password
                $rand = rand(111111,999999);
                $createUser->password = Hash::make($user->getName().$rand);
 
                /// save
                $createUser->save();
                 
                /// login
                Auth::login($createUser);
                return redirect('/admin/dashboard');
            }
     
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
