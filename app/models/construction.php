<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class construction extends Model
{
    protected $table = 'construction';

    protected $fillable = ['name','image','des','title','status'];

    // thêm dữ liệu
    public function add(){
    	$validate = request()->validate(
			[
				'name' => 'required',
				'title' => 'required',
				'des' => 'required',
				'file' => 'required',
				// 'file'=>'required|max:10000|mimes:jpg,jpeg,png,gif'
			],
			[
				'required' => ':attribute đang bỏ trống.',
				'min' => ':attribute chưa được chọn',
				'max' => 'Cỡ ảnh quá lớn',
				'mimes' => 'Không đúng định dạng ảnh'
			],
			[
                 'name' => 'Tên',
                 'des' => 'Mô tả',
                 'title' => 'Tiêu đề',
                 'file' =>'Ảnh'
			]
		);
        $status = request()->status;
	    if($status){
	    	$status = 1;
	    }else{
	    	$status = 0;
	    }
		if(request()->hasFile('file')) {
		    foreach(request()->file('file') as $img) {
		        $image = $img->getClientOriginalName();
		        $img->move(base_path('public/Uploads'),$image);

		        $data[] = $image;
		    }
		}
		$models = $this->create([
			'name' => request()->name,
			'des' => request()->des,
			'title' => request()->title,
			'image' => json_encode($data, JSON_FORCE_OBJECT),
			'status' => $status,
		]);
		$models -> save();

		// dd($models);
		return $models;

	}
	// cập nhật dữ liệu
	public function update_data($con){
		$validate = request()->validate(
			[
				'name' => 'required',
				'title' => 'required',
				'des' => 'required',
				// 'file'=>'required|max:10000|mimes:jpg,jpeg,png,gif'
			],
			[
				'required' => ':attribute đang bỏ trống.',
				'min' => ':attribute chưa được chọn',
				'max' => 'Cỡ ảnh quá lớn',
				'mimes' => 'Không đúng định dạng ảnh'
			],
			[
                 'name' => 'Tên',
                 'des' => 'Mô tả',
                 'title' => 'Tiêu đề',
                 'file' =>'Ảnh'
			]
		);
        $status = request()->status;
	    if($status){
	    	$status = 1;
	    }else{
	    	$status = 0;
	    }
	    // $data[] = $con->image;
		if(request()->hasFile('file')) {
		    foreach(request()->file('file') as $img) {
		        $image = $img->getClientOriginalName();
		        $img->move(base_path('public/Uploads'),$image);

		        $data[] = $image;
		    }
		    // dd($data);
		}else{
			$data = $con->image;
		}
		// die;
		$updated = $this->update([
			'name' => request()->name,
			'des' => request()->des,
			'title' => request()->title,
			'image' => json_encode($data, JSON_FORCE_OBJECT),
			'status' => $status,
		]);
		// $updated -> save();
	}
}
