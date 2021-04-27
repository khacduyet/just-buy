<?php
	namespace App\Http\Controllers\admin;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\consultant;
	use File;

	class consultantController extends Controller {

    	public function __construct(){
	        $this->middleware(function($request,$next){
	            view()->share([
	                'count_consul' => count(Consultant::where('status',0)->get()),
	            ]);
	            return $next($request);
	        });
	    }
		//danh sách dữ liệu
		public function list_con(){
			$consultant = consultant::all();
        	return view('pages.admin.consultant.list', [
        		'consultant' => $consultant
        	]);
		}
		public function store(Request $request,consultant $consultant){
			$model = $consultant->add();
	        if ($consultant) {
	            return redirect()->back() -> with('message','Inserted successful');
	        }else{
	            return redirect()->back()->with('message','Insert fail' );
	        }
		}
		public function update(request $request,consultant $id){
			$updated = $id->update_data();
	       	if ($id) {
	        	return redirect()->route('list-consultant') -> with('message','Updated successful');
	    	} else {
	     		return redirect()->back()->with('message','Updated fail');
	    	}
		}
	}



 ?>
