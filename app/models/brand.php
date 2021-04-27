<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\brand;

class brand extends Model
{
    protected $table = 'brand';

    protected $fillable = ['name','image','status'];
    
    // thêm dữ liệu
    public function add(){
    	$validate = request()->validate(
			[
				'name' => 'required',
				'file'=>'required|max:10000|mimes:jpg,jpeg,png,gif'
			],
			[
				'required' => ':attribute is empty.',
				'min' => ':attribute is too small',
				'max' => 'Size image is too max',
				'mimes' => 'Incorrect image format'
			],
			[
                 'name' => 'Name',
                 'file' =>'Image'
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
			$file -> move(base_path('public/Uploads'),$file -> getClientOriginalName());
			$image = $file -> getClientOriginalName();
		}
		 $models = $this->create([
			'name' => request()->name,
			'image' => $image,
			'status' => $status,
		]);
		return $models;

	}
	// cập nhật dữ liệu
	public function update_data($pro){
		$validate = request()->validate(
			[
				'name' => 'required',
				'file'=>'max:10000|mimes:jpg,jpeg,png,gif'
			],
			[
				'required' => ':attribute is empty.',
				'max' => 'Size image is too max',
				'mimes' => 'Incorrect image format'
			],
			[
                 'name' => 'Tên',
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
			$file -> move(base_path('public/Uploads'),$file -> getClientOriginalName());
			$image = $file -> getClientOriginalName();
		}else{
			$image = $pro->image;
		}
		$updated = $this->update([
			'name' => request()->name,
			'image' => $image,
			'status' => $status,
		]);
	}
}
