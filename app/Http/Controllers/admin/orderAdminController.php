<?php
	namespace App\Http\Controllers\admin;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Redirect;
	use App\Models\customer;
	use App\Models\orders;
	use App\Models\order_detail;
	use App\Mail\OrderShipped;
	use App\Models\consultant;
	use Auth;
	use Mail;
	use Hash;
	use File;
	use Session;


	class orderAdminController extends Controller{

    	public function __construct(){
	        $this->middleware(function($request,$next){
	            view()->share([
	                'count_consul' => count(Consultant::where('status',0)->get()),
	            ]);
	            return $next($request);
	        });
	    }
		public function list_order(){
			$orders = orders::orderBy('status','desc') ->get();
			return view('pages.admin.customer.list-order',[
				'orders' => $orders,
			]);
		}
		public function detail($id){
            $orders = orders::where('id', $id)->first();
			return view('pages.admin.customer.order-detail',[
				'orders' => $orders,
			]);
		}
		public function confirm_order($id)
		{

			Orders::find($id)->update([
				'status' => 1
			]);
			$orders = orders::where('id', $id)->first();
			$order_detail = order_detail::All()->where('id_oder',$id);
			$email = $orders->getCus->email;
			$data = [
				'name' => $orders->getCus->name,
				'order_detail' => $order_detail,
				'orders' => $orders,
			];
			if($orders){
				if($order_detail){
					Mail::send('pages.client.email',$data,function($message) use ($data, $email){
						$message->from('justbuy.bkap@gmail.com');
						$message->to($email,'System Message Justbuy!')->subject('System Message Justbuy!');
					});
					return redirect()->route('order-customer');
				}else{
					Mail::to($email) -> send("Order failed!");
					$orders->delete();
					return redirect()->route('order-customer');
				}
			}
		}
		public function complete_order($id)
		{
			Orders::find($id)->update([
				'status' => 2
			]);
			return redirect()->route('order-customer');
		}

	}

 ?>
