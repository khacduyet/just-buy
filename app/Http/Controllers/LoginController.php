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
            return redirect()->route('login_user') -> with('success','Đăng ký thành công');
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
            return redirect()->route('product')->with('success','Đăng nhập thành công');
        } else {
            Session::flash('message', "Email hoặc mật khẩu không đúng");
            return Redirect::back()->withInput();
        }

    }
    public function postLogOut(Request $request,Customer $user){
        $user->logout();
        return redirect()->route('login_user') -> with('success','Mời đăng nhập lại');
    }

    public function forget_pass() {
        return view('pages.client.forget-password');
    }
    public function sendCodeReset(Request $request) {
        $email = $request->email;

        $checkUser = Customer::where('email',$email)->first();

        if(!$checkUser) {
            Session::flash('message', "Email không tồn tại");
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
            $message->to($checkUser->email,'Tin nhắn hệ thống vinh loc !')->subject('Khôi phục mật khẩu');
        });
        return redirect()->back()->with('success','Link đã được gửi vào email của bạn');
    }

    public function resetPassword(Request $request) {
        $code = $request->code;
        $email = $request->email;

        $checkUser = Customer::where([
            'code' => $code,
            'email' => $email
        ])->first();
        if(!$checkUser) {
            return redirect('/')->with('danger','Đường dẫn lấy lại mật khẩu không đúng,vui lòng thử lại !');
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
				'required' => ':attribute đang bỏ trống.',
                'min' => ':attribute phải trên 6 ký tự',
                'same' => ':attribute phải giống mật khẩu'
			],
			[
                 'password_new' => 'Mật khẩu',
                 'confirm_password_new' => 'Xác nhận mật khẩu'
			]
        );

        $code = $request->code;
        $email = $request->email;
        $checkUser = Customer::where([
            'code' => $code,
            'email' => $email
        ])->first();

        if(!$checkUser) {
            return redirect('/')->with('danger','Đường dẫn lấy lại mật khẩu không đúng,vui lòng thử lại !');
        }

        $checkUser->password = Hash::make($request->password_new);
        $checkUser->save();

        return redirect('/account/login')->with('success','Đổi mật khẩu thành công mời bạn đăng nhập');
    }
}
