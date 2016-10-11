<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Social;
use Illuminate\Support\Facades\Input;

class SocialController extends Controller
{
    public function getSocialRedirect( $provider )
    {
        $providerKey = Config::get('services.' . $provider);

        if (empty($providerKey)) {
            return 'No such social provider';
        }

        return Socialite::driver( $provider )->redirect();
    }

    public function getSocialHandle( $provider )
    {
        if (Input::get('denied') != '') {
            return 'Nisi dozvolio pristup tvom nalogu.';
        }

        $user = Socialite::driver( $provider )->user();

        $socialUser = null;

        //Check is this email existing
        $userCheck = User::where('email', $user->email)->first();//todo Twitter does not provide email

        $email = $user->email;
        if (!$user->email) {
            $email = 'missing' . str_random(10);
        }

        if (!empty($userCheck)) {

            $socialUser = $userCheck;

        } else {

            $sameSocialId = Social::where('social_id', $user->id)->where('provider', $provider)->first();

            if (empty($sameSocialId)) {
                // New social user
                $newSocialUser = new User;
                $newSocialUser->email = $email;
                $name = explode(' ', $user->name);
                $newSocialUser->first_name = $name[0];
                $newSocialUser->last_name = $name[1];
                $newSocialUser->password = bcrypt(str_random(16));
                $newSocialUser->username = 'Korisnik_' . str_random(8);
                $newSocialUser->save();

                $socialData = new Social;
                $socialData->social_id = $user->id;
                $socialData->provider = $provider;

                $newSocialUser->social()->save($socialData);

                $socialUser = $newSocialUser;

            } else {

                // Load existing social user
                $socialUser = $sameSocialId->user;

            }
        }

        auth()->login($socialUser, true);

        return redirect()->intended('/');
    }
}