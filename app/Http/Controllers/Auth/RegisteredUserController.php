<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $request->role_checker = $request->role_checker == null ? '0' : $request->role_checker;

        //$data = contains all request data and manual data
        $data = collect([
            $request->except('_token', 'password', 'password_confirmation', 'role_checker'),
            [
                'role_id' => '2',
                'password' => Hash::make($request->password),
                'role_checker' => $request->role_checker,
            ]
        ])->collapse()->all();
        $user = User::create($data);

        // $user = User::create([ // role-checker not working in this
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role_id' => '2',
        //     'role_checker' => $request->role_checker,
        // ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
