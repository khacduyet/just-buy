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
			],
			[
				'required' => ':attribute is empty.',
				'min' => ':attribute is too small',
				'max' => 'Size image is too max',
				'mimes' => 'Incorrect image format'
			],
			[
                 'name' => 'Name',
                 'des' => 'Description',
                 'title' => 'Title',
                 'file' =>'Image'
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
		return $models;

	}
	// cập nhật dữ liệu
	public function update_data($con){
		$validate = request()->validate(
			[
				'name' => 'required',
				'title' => 'required',
				'des' => 'required',
			],
			[
				'required' => ':attribute is empty.',
				'min' => ':attribute is too small',
				'max' => 'Size image is too max',
				'mimes' => 'Incorrect image format'
			],
			[
                 'name' => 'Name',
                 'des' => 'Description',
                 'title' => 'Title',
                 'file' =>'Image'
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
		}else{
			$data = $con->image;
		}
		$updated = $this->update([
			'name' => request()->name,
			'des' => request()->des,
			'title' => request()->title,
			'image' => json_encode($data, JSON_FORCE_OBJECT),
			'status' => $status,
		]);
	}
}
