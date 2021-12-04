<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kecamatan;
use App\Models\Team;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        if (request()->has('signature') && !request()->hasValidSignature()) {
            return redirect()->route('register');
        }

		$kecamatans = Kecamatan::get();
		$teams = Team::get();
		
        return view('auth.register', compact('kecamatans', 'teams'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'phone'     => ['required', 'string', 'max:15'],
			'kecamatan' => ['required', 'string', 'max:255'],
            'password'  => ['required', 'string', 'min:8', "max:10", 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name'         => $data['name'],
            'email'        => $data['email'],
			'phone'        => $data['phone'],
			'kecamatan_id' => request()->input('kecamatan', null),
            'password'     => Hash::make($data['password']),
            'team_id'      => request()->input('team', null),
        ]);

        if (!request()->has('team')) {
            $team = Team::create([
                'owner_id' => $user->id,
                'name'     => $data['email'],
            ]);

            $user->update(['team_id' => $team->id]);
        }

        return $user;
    }
}
