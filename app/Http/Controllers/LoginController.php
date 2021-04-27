<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\categories;
use App\Models\products;
use App\Models\Cart;
use App\Models\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware(function($request,$next){
            view()->share([
                'categories' => Categories::all(),
                'config' => Config::all(),
                'cart' => new cart()
            ]);
            return $next($request);
        });
    }
    public function register() {
        return view('pages.client.register');
    }
    public function postRegister(Request $request,Customer $user) {
        $user->register();
        if ($user) {
            return redirect()->route('login_user') -> with('success','Success');
        }else{
            return redirect()->back()->withInput();
        }
    }

    protected function login() {
        return view('pages.client.login');
    }
    public function postLogin(Request $request,Customer $user) {
        if($user->login()) {
            $user->login();
            return redirect()->route('product')->with('success','Success');
        } else {
            Session::flash('message', "Email or password is incorrect");
            return Redirect::back()->withInput();
        }

    }
    public function postLogOut(Request $request,Customer $user){
        $user->logout();
        return redirect()->route('login_user') -> with('success','Please login again');
    }

    public function forget_pass() {
        return view('pages.client.forget-password');
    }
    public function sendCodeReset(Request $request) {
        $email = $request->email;

        $checkUser = Customer::where('email',$email)->first();

        if(!$checkUser) {
            Session::flash('message', "Email does not exist");
            return redirect()->back();
        }

        $code = bcrypt(md5(time().$email));

        $checkUser->code = $code;
        $checkUser->time_code = Carbon::now();
        $checkUser->save();

        $url = route('getLinkReset',['code'=> $checkUser->code,'email' => $email]);
        $data = [
            'route' => $url,
            'name' => $email
        ];

        Mail::send('pages.client.email-reset',$data,function($message) use ($checkUser){
            $message->from('justbuy.bkap@gmail.com');
            $message->to($checkUser->email,'System Message Justbuy!')->subject('Password recovery');
        });
        return redirect()->back()->with('success','The link has been sent to your email');
    }

    public function resetPassword(Request $request) {
        $code = $request->code;
        $email = $request->email;

        $checkUser = Customer::where([
            'code' => $code,
            'email' => $email
        ])->first();
        if(!$checkUser) {
            return redirect('/')->with('danger','The password reset path is incorrect, please try again!');
        }

        return view('pages.client.reset-password',compact('email','code'));
    }
    public function saveResetPassword(Request $request) {
        $validate = request()->validate(
			[
                'password_new' => 'required|min:6',
				'confirm_password_new' => 'required|same:password_new',
			],
			[
				'required' => ':attribute is empty.',
                'min' => ':attribute must be over 6 characters',
                'same' => ':attribute must match the password'
			],
			[
                 'password_new' => 'Password ',
                 'confirm_password_new' => 'Confirm password '
			]
        );

        $code = $request->code;
        $email = $request->email;
        $checkUser = Customer::where([
            'code' => $code,
            'email' => $email
        ])->first();

        if(!$checkUser) {
            return redirect('/')->with('danger','The password reset path is incorrect, please try again!');
        }

        $checkUser->password = Hash::make($request->password_new);
        $checkUser->save();

        return redirect('/account/login')->with('success','Password successfully changed, please login');
    }
}
