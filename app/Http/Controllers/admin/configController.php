<?php
	namespace App\Http\Controllers\admin;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\consultant;
	use App\Models\config;
	use File;

	class configController extends Controller {
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
			$config = config::all();
        	return view('pages.admin.config.list', [
        		'config' => $config
        	]);
		}
		public function about(){
			$config = config::all();
        	return view('pages.admin.config.about', [
        		'config' => $config
        	]);
		}
		public function service(){
			$config = config::all();
        	return view('pages.admin.config.service', [
        		'config' => $config
        	]);
		}

		// thêm dữ liệu
		public function create(){
			return view('pages.admin.config.add');
		}
		public function store(Request $request,config $config){
			$model = $config->add();
	        if ($config) {
	            return redirect()->route('list-config') -> with('message','Thêm mới thành công');
	        }else{
	            return redirect()->back()->with('message','Thêm thất bại' );
	        }
		}
		// sửa dữ liệu
		public function edit($id){
			$config = config::where('id', $id)->first();
			return view('pages.admin.config.edit',[
        		'config' => $config,
        	]);
        	
		}
		public function update(request $request,config $id){
			$updated = $id->update_data($id);
	       	if ($id) {
	        	return redirect()->route('admin') -> with('message','Sửa thành công');
	    	} else {
	     		return redirect()->back()->with('message','Sửa thất bại');
	    	}
		}

		// xóa dữ liệu
		public function delete(config $id)
	    {
	        $delete = $id->delete();
	        if ($id) {
	           return redirect()->route('list-config') -> with('message','Xóa thành công');
	       } else {
	        return redirect()->back()->with('message','Xóa thất bại');
	       }
	    }
	}



 ?>
