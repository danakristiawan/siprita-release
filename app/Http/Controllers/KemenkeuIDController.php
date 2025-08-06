<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class KemenkeuIDController extends Controller
{
    /**
     * Redirect the user to the KemenkeuID Connect provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('kemenkeuid')->redirect();
    }

    /**
     * Obtain the user information from KemenkeuID Connect.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('kemenkeuid')->user();
        $authUser = User::firstOrCreate(
            ['email' => $user->getEmail()],
            ['name' => $user->getName(), 'password' => Hash::make('12345678')]
        );
        Auth::login($authUser);
        Session::regenerate();
        Session::put('userInfo', json_decode(json_encode($user->user), false));
        return redirect()->to('/profil');
    }

    /**
     * Obtain the user information from KemenkeuID Connect.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $idToken = Session::get('id_token');
        
        Auth::logout();
        Session::forget('userInfo', 'id_token');
        Session::flush();
        Session::invalidate();

        $logoutUrl = Socialite::driver('kemenkeuid')->logout($idToken);

        return redirect($logoutUrl );
    }
}
