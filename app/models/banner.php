<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    protected $table = 'banner';

    protected $fillable = ['name','image','location','link','status'];
    // đổ dữ liệu
    public function get_list(){
    	return banner::where('status',1)->get();
    }
    // thêm dữ liệu
    public function add(){
    	$validate = request()->validate(
			[
				'name' => 'required',
				'location' => 'required',
				'link' => 'required',
				'file'=>'required|max:10000|mimes:jpg,jpeg,png,gif'
			],
			[
				'required' => ':attribute đang bỏ trống.',
				'min' => ':attribute chưa được chọn',
				'max' => 'Cỡ ảnh quá lớn',
				'mimes' => 'Không đúng định dạng ảnh'
			],
			[
                 'name' => 'Tên banner',
                 'location' => 'Vị trí',
                 'link' => 'Đường dẫn',
                 'file' =>'Ảnh'
			]
		);
    	$status = request()->status;
	    if($status){
	    	$status = 1;
	    }else{
	    	$status = 0;
	    }
	    $image = '';
		if(request() -> has('file')){
			$file = request() -> file;
			$file -> move(base_path('public/Uploads/Banner'),$file -> getClientOriginalName());
			$image = $file -> getClientOriginalName();
		}
		 $models = $this->create([
			'name' => request()->name,
			'image' => $image,
			'location' => request()->location,
			'link' => request()->link,
			'status' => $status,
		]);
		return $models;

	}
	// cập nhật dữ liệu
	public function update_data($ban){
		$validate = request()->validate(
			[
				'name' => 'required',
				'location' => 'required',
				'link' => 'required',
				'file'=>'max:10000|mimes:jpg,jpeg,png,gif'
			],
			[
				'required' => ':attribute đang bỏ trống.',
				'min' => ':attribute chưa được chọn',
				'max' => 'Cỡ ảnh quá lớn',
				'mimes' => 'Không đúng định dạng ảnh'
			],
			[
                 'name' => 'Tên banner',
                 'location' => 'Vị trí',
                 'link' => 'Đường dẫn',
                 'file' =>'Ảnh'
			]
		);
    	$status = request()->status;
	    if($status){
	    	$status = 1;
	    }else{
	    	$status = 0;
	    }
	    $image = '';
		if(request() -> has('file')){
			$file = request() -> file;
			$file -> move(base_path('public/Uploads/Banner'),$file -> getClientOriginalName());
			$image = $file -> getClientOriginalName();
		}else{
			$image = $ban->image;
		}
		$updated = $this->update([
			'name' => request()->name,
			'image' => $image,
			'location' => request()->location,
			'link' => request()->link,
			'status' => $status,
		]);
	}
}
