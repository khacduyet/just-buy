<?php
	namespace App\Http\Controllers\admin;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\construction;
	use App\Models\consultant;
	use File;

	class constructionController extends Controller {
		
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
			$construction = construction::all();
        	return view('pages.admin.construction.list', [
        		'construction' => $construction
        	]);
		}


		// thêm dữ liệu
		public function create(){
			return view('pages.admin.construction.add');
		}
		public function store(Request $request,construction $construction){
			$model = $construction->add();
	        if ($construction) {
	            return redirect()->route('list-construction') -> with('message','Inserted successful');
	        }else{
	            return redirect()->back()->with('message','Insert fail' );
	        }
		}
		// sửa dữ liệu
		public function edit($id){
			$construction = construction::where('id', $id)->first();
        	return view('pages.admin.construction.edit',[
        		'construction' => $construction,
        	]);
		}
		public function update(request $request,construction $id){
			$updated = $id->update_data($id);
	       	if ($id) {
	        	return redirect()->route('list-construction') -> with('message','Updated successful');
	    	} else {
	     		return redirect()->back()->with('message','Updated fail');
	    	}
		}

		// xóa dữ liệu
		public function delete(construction $id)
	    {
	        $delete = $id->delete();
	        if ($id) {
	           return redirect()->route('list-construction') -> with('message','Deleted successful');
	       } else {
	        return redirect()->back()->with('message','Delete fail');
	       }
	    }
	}



 ?>
