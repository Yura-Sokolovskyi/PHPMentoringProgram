<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Routing\Redirector;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends BaseController
{
    public function redirectToProvider(): RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback(): Redirector|Application|RedirectResponse
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::query()->firstWhere('provider_id', $githubUser->getId());

        if (! $user) {
            $user = new User([
                'email' => $githubUser->getEmail(),
                'name' => $githubUser->getNickname(),
                'provider_id' => $githubUser->getId(),
            ]);
        }

        auth()->login($user, true);

        return redirect()->route('dashboard');
    }
}
