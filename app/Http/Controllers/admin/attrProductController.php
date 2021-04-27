<?php
	namespace App\Http\Controllers\admin;

	use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\productAttribute;
	use App\Models\consultant;
	use File;

	class attrProductController extends Controller {
    	public function __construct(){
	        $this->middleware(function($request,$next){
	            view()->share([
	                'count_consul' => count(Consultant::where('status',0)->get()),
	            ]);
	            return $next($request);
	        });
	    }
		//danh sách dữ liệu
		public function list_attrProduct(){
            $attrProduct = productAttribute::all();
        	return view('pages.admin.attribute.attr_product.list', [
                'attrProduct' => $attrProduct
        	]);
		}
	}
 ?>
