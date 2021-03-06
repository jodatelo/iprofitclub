<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Balance;
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
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function registerPage($referral)
    {
        return view('auth.register', compact('referral'));
        //echo $referral;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dni' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'ref' => ['required', 'string', 'max:255', 'exists:users,email'],
            /*'avatar' => ['required', 'image' ,'mimes:jpg,jpeg,png','max:1024'],*/
        ]);
    }

    /** 
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // return request()->file('avatar');
        /*if (request()->has('avatar')) {
            $avatar = request()->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
        }
*/
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'dni' => $data['dni'],
            'ref' => $data['ref'],
            'isAdmin' => 0,
            'status'=>1,
            'password' => Hash::make($data['password']),
            //'avatar' =>  $avatarName,
        ]);
        $balance= new Balance();
        $balance->user_id=$user->id;
        $balance->saldo=0;
        $balance->fechaact=date('Y-m-d H:i:s');
        $balance->userupd_id=$user->id;
        $balance->isDeleted=0;
        $balance->status=1;
        $balance->created_at=date('Y-m-d H:i:s');
        $balance->saveOrFail();

        return $user;
    }
}
