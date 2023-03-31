<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Notifications\GeneralNotification;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Notification;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        
        $request->authenticate();

        $user = auth()->user();

        $request->session()->regenerate();

        if($user['type'] == 'admin'){
            return redirect()->intended(RouteServiceProvider::ADMINHOME);
        }

        $data = [
            'name' => $user->name,
            'subject' => 'Login Notiification',
            'message' => 'Please be informed that your '.env('APP_NAME').' account was accessed at '.Carbon::now()->addHours(1)->toDateTimeString(),
            'body' => 'If you did not log on to your '.env('APP_NAME').' at the time detailed above, please send an email to '.env('APP_MAIL').' imediately',
            'thankyou' => 'Thank you for trusting in our services',
        ];

        Notification::send($user, new GeneralNotification($data, ['mail', 'database']));
        toast('Your Login was successful!','success');
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        toast('Your Logout Successfully!','success');
        return redirect('/');
    }
}
