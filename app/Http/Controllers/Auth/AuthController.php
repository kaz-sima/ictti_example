<?php
namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }    
    /**
     * Obtain the user information from providers.
     *
     * @return Response
     */
    public function callback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('/login');
        }
        $account = $this->findOrCreateUser($user, $provider);
        Auth::login($account, true);
        return redirect('/home');
    }
    
    public function findOrCreateUser($user, $provider)
    {
        $account = User::where('provider_id', $user->getId())->first();
        if ($account){
            return $account;
        }
        if(is_null($user->name)) $user->name = "someone";
        return User::create([
            'name'=> $user->name,
            'email' => $user->email,
            'provider'  => $provider,
            'provider_id'  => $user->id,
        ]);
    }
}
