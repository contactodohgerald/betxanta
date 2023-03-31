<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Trait\CurrencyHandler;
use App\Trait\UniqueHandler;

class RegisteredUserController extends Controller
{
    use CurrencyHandler, UniqueHandler;
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $view = [
            'country' => $this->getCountry(),
        ];
        return view('auth.register', $view);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'country' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $currency =  $this->getSingleCurrency()->id;

        if($request->referred != ''){
            $users = User::where('referral', $request->referred)->first();
            if($users == null){
                toast('Referral Code does not match any user, copy and paste  ','error');
                return redirect()->back();
            }
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'country_id' => $request->country,
            'type' => 'user',
            'wallet_bal' => $this->processExchangeRate(0, 'to_db'),
            'referral' => $this->uniqueId(20),
            'ref_bal' => $this->processExchangeRate(0, 'to_db'),
            'referred' => $request->referred,
            'preferred_cur' => $currency,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        toast('Your Regitration was successful, verify your account to continue','success');
        return redirect(RouteServiceProvider::HOME);
    }
}
