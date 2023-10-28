<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        $redirect_uri = $request->redirect_uri;
        $countries = Country::all();
        $cities = City::all();
        return view('auth.register', compact('redirect_uri', 'countries', 'cities'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'telephone' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'string', 'max:255', 'exists:App\Models\Country,id'],
            'city_id' => ['required', 'string', 'max:255', 'exists:App\Models\City,id'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'role_id' => Role::where('slug', '=', config('seeding.default_role_slug'))->first()->id,
            'password' => Hash::make($request->password),
            'email_verified_at' => now()
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect($request->redirect_uri ? '/'.$request->redirect_uri : RouteServiceProvider::HOME);
    }
}
