<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $agent = new Agent;

        if ($agent->isMobile()) {
            return view('mobiles.auth.register');
        } elseif ($agent->isDesktop()) {
            return view('desktop.auth.register');
        } else {
            // Jika bukan perangkat mobile atau desktop, Anda bisa mengembalikan tampilan default di sini.
            return view('desktop.auth.register');
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([ 
            'nik_number' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        // Create the user
        $user = User::create($input);
    
        // Generate QR Code based on the user's ID
        $qrLink = route('applicants.show', ['applicant' => $user->id]);
        $qrCode = QrCode::size(200)->generate($qrLink);
    
        // Save the QR code link into the user record
        $user->qr_link = $qrCode;
        $user->save();
    
        event(new Registered($user));
    
        Auth::login($user);
    
        return redirect(RouteServiceProvider::REGISTER);
    }    
}
