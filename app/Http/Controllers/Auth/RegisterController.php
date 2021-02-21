<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Mail;
use Session;

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
    protected $redirectTo = 'user/profile-edit';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = array( 
            'email1.unique' => 'The email has already been taken.',
            'email1.email' => 'The email must be a valid address.',
            'password1.confirmed' => 'The password confirmation does not match.',
            'password1.min' => 'The password must be atleast 6 characters.'
        );
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email1' => 'required|string|email|max:255|unique:users,email',
            'password1' => 'required|string|min:6|confirmed',
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */         
    protected function create(array $data)
    {

        $confirmation_code = str_random(30);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email1'],
            'password' => bcrypt($data['password1']),
            'confirmation_code' => $confirmation_code
        ]);

        Mail::send('email.verify', ['confirmation_code' => $confirmation_code], function($message) {
            $message->to(Input::get('email1'))->subject('Verify your email address');
        });
        
        // Session::flash('message', "Please check your mail to verify your email")->info()->important();
        flash('Please check your mail to verify your email')->info()->important();
        return $user; 
    }
}
