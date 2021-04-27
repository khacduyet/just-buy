<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Client\Request;

use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $table = 'customer';

    protected $fillable = ['name','email','password','code','time_code'];

    protected $guard = 'customer';


    public function register() {
        $validate = request()->validate(
			[
				'name' => 'required',
				'email' => 'required|unique:customer,email',
                'password' => 'required|min:6',
				'confirm_password' => 'required|same:password',
			],
			[
				'required' => ':attribute is empty.',
				'unique' => ':attribute already exists',
                'min' => ':attribute must be over 6 characters',
                'same' => ':attribute must match the password'
			],
			[
                 'name' => 'Name ',
                 'email' => 'Email ',
                 'password' => 'Password ',
                 'confirm_password' => 'Confirm password '
			]
        );
        $models = $this->create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => Hash::make(request()['password'])
        ]);
        return $models;
    }

    public function login() {
        $validator = request()->validate(
			[
				'email' => 'required',
				'password' => 'required',
			],
			[
				'required' => ':attribute is empty.',
			],
			[
                 'email' => 'Email',
                 'password' => 'Password',
			]
        );

        if (Auth::guard('customer')->attempt(request()->only('email','password'))){
            return true;
         } else {
            return false;
         }
    }

    public function logout() {
        Auth::guard('customer')->logout();
    }
    public function countAll(){
        return count(Customer::get());
    }
}
