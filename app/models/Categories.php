<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\products;

class categories extends Model
{
    protected $table = 'categories';

    protected $fillable = ['slug','name','image'];
    // lấy dữ liệu
    public function list_cat(){
    	return categories::orderBy('id','DESC')->get();
    }
    // thêm dữ liệu
    public function add(){
    	$image = '';
		if(request() -> has('file')){
			$file = request() -> file;
			$file -> move(base_path('public/Uploads'),$file -> getClientOriginalName());
			$image = $file -> getClientOriginalName();
		}
		$models = $this->create([
			'name' => request()->name,
			'slug' => Str::slug(request()->name),
			'image' => $image,
		]);
		return $models;

	}
	// cập nhật dữ liệu
	public function update_data($id){
		$image = '';
		if(request() -> has('file')){
			$file = request() -> file;
			$file -> move(base_path('public/Uploads'),$file -> getClientOriginalName());
			$image = $file -> getClientOriginalName();
		}else{
			$image = $id->image;
		}
		$updated = $this->update([
			'name' => request()->name,
			'slug' => Str::slug(request()->name),
			'image' => $image,
		]);
	}
    public function deletePro($value){
        products::where('cate_id',$value->id)->delete();
    }
}
