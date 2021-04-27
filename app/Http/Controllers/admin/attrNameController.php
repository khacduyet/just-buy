<?php
	namespace App\Http\Controllers\admin;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\attribute;
	use App\Models\consultant;
	use File;

	class attrNameController extends Controller {
    	public function __construct(){
	        $this->middleware(function($request,$next){
	            view()->share([
	                'count_consul' => count(Consultant::where('status',0)->get()),
	            ]);
	            return $next($request);
	        });
	    }
		//danh sách dữ liệu
		public function list_attrName(){
			$attrName=attribute::all();
        	return view('pages.admin.attribute.attr_name.list', [
        		'attrName' => $attrName
        	]);
		}
		// thêm dữ liệu
		public function create(){
			return view('pages.admin.attribute.attr_name.add');
		}
		public function store(Request $request,attribute $attrName){
			$request->validate([
			    'name' => 'required|unique:attributes|max:255',
			]);
			$attrName->add();
	        if ($attrName) {
	            return redirect()->route('list-attrName') -> with('message','Thêm mới thành công');
	        }else{
	            return redirect()->back()->with('message','Thêm mới thất bại' );
	        }
		}
		// sửa dữ liệu
		public function edit($id){
			$attrName = attribute::where('id', $id)->first();
        	return view('pages.admin.attribute.attr_name.edit',[
        		'attrName' => $attrName
        	]);
		}
		public function update(request $request,attribute $id){
			$id->update_data();
	       	if ($id) {
	        	return redirect()->route('list-attrName') -> with('message','Sửa thành công');
	    	} else {
	     		return redirect()->back()->with('message','Sửa thất bại');
	    	}
		}
		// xóa dữ liệu
		public function delete(attribute $id)
	    {
	        $id->delete();
	        if ($id) {
	        	$id->deleteProAtt($id);
	        	$id->deleteAttValue($id);
	           return redirect()->route('list-attrName') -> with('message','Xóa thành công');
	       } else {
	        return redirect()->back()->with('message','Xóa thất bại');
	       }
	    }
	}



 ?>
