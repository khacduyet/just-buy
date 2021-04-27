<?php

    namespace App\Http\Controllers\admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Models\Customer;
    use App\Models\consultant;
    use Auth;
	use Hash;

    class customerController extends Controller {


        public function __construct(){
            $this->middleware(function($request,$next){
                view()->share([
                    'count_consul' => count(Consultant::where('status',0)->get()),
                ]);
                return $next($request);
            });
        }
        //danh sách dữ liệu
		public function list_cus(){
			$customer = Customer::all();
        	return view('pages.admin.customer.list',[
        		'customer' => $customer
        	]);
		}


		// thêm dữ liệu
    }

 ?>
