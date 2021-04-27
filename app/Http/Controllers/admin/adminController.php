<?php

    namespace App\Http\Controllers\admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Models\Customer;
    use App\Models\Consultant;
    use App\Models\Orders;
    use Illuminate\Support\Facades\Session;
    use Auth;
	use Hash;

    class adminController extends Controller {
    	public function __construct(){
	        $this->middleware(function($request,$next){
	            view()->share([
	                'count_consul' => count(Consultant::where('status',0)->get()),
	            ]);
	            return $next($request);
	        });
	    }
        public function admin(Customer $cus, Orders $ord,consultant $con) {
        	$countCus = $cus->countAll();
        	$countConSuc = $con->countSuc();
        	$countOrdSuc = $ord->countSuc();
        	$countOrdNew = $ord->countNew();
            return view('pages.admin.index',compact('countCus','countConSuc','countOrdSuc','countOrdNew'));
        }

        //danh sách dữ liệu
		public function list_ad(){
			$User=User::all();
        	return view('pages.admin.admin.list', [
        		'admin' => $User
        	]);
		}

		public function ad_detail(){
        	return view('pages.admin.admin.admin-detail');
		}
		// thêm dữ liệu
		public function create(){
			return view('pages.admin.admin.add');
		}
		public function store(Request $request,User $User){
            $model = $User->add();
	        if ($User) {
	            return redirect()->route('list-admin') -> with('success','Thêm mới thành công');
	        }else{
	            return redirect()->back()->with('message','Thêm mới thất bại' );
	        }
		}
		// sửa dữ liệu
		public function edit($id){
			$User = User::where('id', $id)->first();
			$roles = $User->role;
			$arr_role = explode(",",$roles);
        	return view('pages.admin.admin.edit',[
        		'admin' => $User,
        		'arr_role' => $arr_role,
        	]);
		}
		public function update(request $request,User $id){
			$updated = $id->update_data($id);
	       	if ($id) {
	        	return redirect()->route('list-admin')->with('message','Sửa thành công');
	    	} else {
                Session::flash('message', "Sửa không thành công");
	     		return redirect()->back()->withInput();
	    	}
		}

		// xóa dữ liệu
		public function delete(User $id)
	    {
	        $delete = $id->delete();
	        if ($id) {
	           return redirect()->route('list-admin') -> with('message','Xóa thành công');
	       } else {
	        return redirect()->back()->with('message','Xóa thất bại');
	       }
	    }
	    function login_admin(){
			return view('pages.admin.login',[
			]);
		}
		public function postLogin_admin(Request $request,User $user){
			if($user->login()) {
	            return redirect()->route('admin') -> with('message','Đăng nhập thành công');
	        } else {
	            return redirect()->back()->with('message','Đăng nhập thất bại' );
	        }
		}
		public function logout_admin(){
			Auth::logout();
			return redirect()->route('login');
		}
		public function edit_profile($id){	
			return view('pages.admin.admin.admin-detail');
		}
		public function update_profile(User $id, Request $req){
			$updated = $id->update_profile($id);
	       	if ($id) {
	        	return redirect()->route('admin')->with('message','Sửa thành công');
	    	} else {
                Session::flash('message', "Sửa không thành công");
	     		return redirect()->back()->withInput();
	    	}
		}
    }

 ?>
