<?php
	namespace App\Http\Controllers\admin;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\Categories;
	use App\Models\consultant;
	use File;

	class categoriesController extends Controller {
    	public function __construct(){
	        $this->middleware(function($request,$next){
	            view()->share([
	                'count_consul' => count(Consultant::where('status',0)->get()),
	            ]);
	            return $next($request);
	        });
	    }
		//danh sách dữ liệu
		public function list_cat(){
			$categories=categories::all();
        	return view('pages.admin.categories.list', [
        		'categories' => $categories
        	]);
		}
		// thêm dữ liệu
		public function create(){
			return view('pages.admin.categories.add');
		}
		public function store(Request $request,Categories $categories){
			$request->validate([
			    'name' => 'required|unique:categories|max:255',
			]);

			$model = $categories->add();
	        if ($categories) {
	            return redirect()->route('list-categories') -> with('message','Thêm mới thành công');
	        }else{
	            return redirect()->back()->with('message','Thêm mới thất bại' );
	        }
		}
		// sửa dữ liệu
		public function edit($id){
			$categories = Categories::where('id', $id)->first();
        	return view('pages.admin.categories.edit',[
        		'categories' => $categories
        	]);
		}
		public function update(request $request,categories $id){
			$updated = $id->update_data($id);
	       	if ($id) {
	        	return redirect()->route('list-categories') -> with('message','Sửa thành công');
	    	} else {
	     		return redirect()->back()->with('message','Sửa không thành công');
	    	}
		}
		// xóa dữ liệu
		public function delete(Categories $id)
	    {
	        $delete = $id->delete();
	        if ($id) {
	        	$id -> deletePro($id);
	           return redirect()->route('list-categories') -> with('message','Xóa thành công');
	       } else {
	        return redirect()->back()->with('message','Xóa thành công');
	       }
	    }
	}



 ?>
