<?php
	namespace App\Http\Controllers\admin;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\banner;
	use App\Models\consultant;
	use File;

	class bannerController extends Controller {
    	public function __construct(){
	        $this->middleware(function($request,$next){
	            view()->share([
	                'count_consul' => count(Consultant::where('status',0)->get()),
	            ]);
	            return $next($request);
	        });
	    }

		//danh sách dữ liệu
		public function list_ban(){
			$banner = banner::all();
        	return view('pages.admin.banner.list', [
        		'banner' => $banner
        	]);
		}
		// thêm dữ liệu
		public function create(){
			return view('pages.admin.banner.add');
		}
		public function store(Request $request,banner $banner){
			$model = $banner->add();
	        if ($banner) {
	            return redirect()->route('list-banner') -> with('message','Thêm mới thành công');
	        }else{
	            return redirect()->back()->with('message','Thêm mới thất bại' );
	        }
		}
		// sửa dữ liệu
		public function edit($id){
			$banner = banner::where('id', $id)->first();
        	return view('pages.admin.banner.edit',[
        		'banner' => $banner,
        	]);
		}
		public function update(request $request,banner $id){
			$updated = $id->update_data($id);
	       	if ($id) {
	        	return redirect()->route('list-banner') -> with('message','Sửa thành công');
	    	} else {
	     		return redirect()->back()->with('message','Sửa thất bại');
	    	}
		}

		// xóa dữ liệu
		public function delete(banner $id)
	    {
	        $delete = $id->delete();
	        if ($id) {
	           return redirect()->route('list-banner') -> with('message','Xóa thành công');
	       } else {
	        return redirect()->back()->with('message','Xóa thất bại');
	       }
	    }
	}



 ?>
