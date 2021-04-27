<?php
	namespace App\Http\Controllers\admin;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
    use App\Models\attributeValue;
    use App\Models\attribute;
	use App\Models\consultant;
	use File;

	class attrValueController extends Controller {
    	public function __construct(){
	        $this->middleware(function($request,$next){
	            view()->share([
	                'count_consul' => count(Consultant::where('status',0)->get()),
	            ]);
	            return $next($request);
	        });
	    }
		//danh sách dữ liệu
		public function list_attrValue(){
            $attrValue = attributeValue::all();
        	return view('pages.admin.attribute.attr_value.list', [
                'attrValue' => $attrValue
        	]);
		}
		// thêm dữ liệu
		public function create(){
            $attrName = attribute::all();
			return view('pages.admin.attribute.attr_value.add',[
                'attrName' => $attrName
            ]);
		}
		public function store(Request $request,attributeValue $attrValue){
			$request->validate([
                'attr_name' => 'required',
                'value' => 'required'
			]);
			$attrValue->add();
	        if ($attrValue) {
	            return redirect()->route('list-attrValue') -> with('message','Thêm mới thành công');
	        }else{
	            return redirect()->back()->with('message','Thêm mới thất bại' );
	        }
		}
		// sửa dữ liệu
		public function edit($id){
            $attrName = attribute::all();
            $attrValue = attributeValue::where('id', $id)->first();
        	return view('pages.admin.attribute.attr_value.edit',[
                'attrValue' => $attrValue,
                'attrName' => $attrName
            ]);
		}
		public function update(request $request,attributeValue $id){
			$id->update_data();
	       	if ($id) {
	        	return redirect()->route('list-attrValue') -> with('message','Sửa thành công');
	    	} else {
	     		return redirect()->back()->with('message','Sửa thất bại');
	    	}
		}
		// xóa dữ liệu
		public function delete(attributeValue $id)
	    {
	        $id->delete();
	        if ($id) {
	        	$id->deleteAttValue($id);
	           return redirect()->route('list-attrValue') -> with('message','Xóa thành công');
	       } else {
	        return redirect()->back()->with('message','Xóa thất bại');
	       }
	    }
	}



 ?>
