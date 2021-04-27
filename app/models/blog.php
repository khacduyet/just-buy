<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table = 'blog';

    protected $fillable = ['slug','name','image','des','content'];
    
    // thêm dữ liệu
    public function add(){
    	$validate = request()->validate(
			[
				'name' => 'required',
				'content' => 'required',
				'des' => 'required',
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
                 'des' => 'Description',
                 'content' => 'Content',
                 'file' =>'Image'
			]
		);
	    $image = '';
		if(request() -> has('file')){
			$file = request() -> file;
			$file -> move(base_path('public/Uploads'),$file -> getClientOriginalName());
			$image = $file -> getClientOriginalName();
		}
		 $models = $this->create([
			'name' => request()->name,
			'slug' => Str::slug(request()->name).Str::random(4),
			'des' => request()->des,
			'image' => $image,
			'content' => request()->content,
		]);
		return $models;

	}
	// cập nhật dữ liệu
	public function update_data($pro){
		$validate = request()->validate(
			[
				'name' => 'required',
				'content' => 'required',
				'des' => 'required',
				'file'=>'max:10000|mimes:jpg,jpeg,png,gif'
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
                 'content' => 'Content',
                 'file' =>'Image'
			]
		);
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
			'slug' => Str::slug(request()->name),
			'des' => request()->des,
			'image' => $image,
			'content' => request()->content,
		]);
	}
}
