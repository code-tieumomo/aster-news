<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirectToProvider(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(string $provider)
    {
        $githubUser = Socialite::driver($provider)->stateless()->user();

        $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ], [
            'github_id' => $githubUser->id,
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'password' => Hash::make($githubUser->email)
        ]);

        Auth::login($user, true);

        return redirect()->route('home.index');
    }
}
