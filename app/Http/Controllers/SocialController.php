<?php

namespace App\Http\Controllers;


use App\Service\SocialService;

use Laravel\Socialite\Facades\Socialite;


class SocialController extends Controller
{
    public function vkRedirect()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function vkCallback()
    {
        $user = Socialite::driver('vkontakte')->user();
        $objSocial = new SocialService();
        if ($user = $objSocial->saveSocialData($user)) {
            \Auth::login($user);
            return redirect()->route('home');
        }
        return back(400);

    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = Socialite::driver('google')->user();
        $objSocial = new SocialService();
        if ($user = $objSocial->saveSocialData($user)) {
            \Auth::login($user);
            return redirect()->route('home');
        }
        return back(400);

    }
}
