<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\productAttribute;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = ['cate_id','code','slug','name','price','image','des','status'];

    // thêm dữ liệu
    public function add(){
    	$validate = request()->validate(
			[
				'code' => 'required|unique:products',
				'name' => 'required',
				'price' => 'required',
				'cate_id' => 'required',
				'des' => 'required',
                'file'=>'required|max:10000|mimes:jpg,jpeg,png,gif',
			],
			[
				'required' => ':attribute is empty.',
				'unique' => ':attribute already exists',
				'min' => ':attribute is too small',
				'max' => 'Size image is too max',
				'mimes' => 'Incorrect image format'
			],
			[
                 'code' => 'Code',
                 'name' => 'Name',
                 'image' => 'Image',
                 'price' => 'Price',
                 'descriptions' => 'Description',
                 'cate_id' => 'Category',
                 'file' =>'Image',
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
			$file -> move(base_path('public/Uploads/products'),$file -> getClientOriginalName());
			$image = $file -> getClientOriginalName();
        }

		 $models = $this->create([
			'cate_id' => request()->cate_id,
			'code' => request()->code,
			'name' => request()->name,
			'slug' => Str::slug(request()->name),
			'price' => request()->price,
			'des' => request()->des,
			'image' => $image,
			'status' => $status,
        ]);
        if(request()->attribute_values) {
            foreach(request()->attribute_values as $value){
                $value = json_decode($value);
                $attr_pro = productAttribute::create([
                    'products_id' => $models->id,
                    'attribute_id' => $value->attribute_id,
                    'attribute_value' => $value->id
                ]);
            }
        }
        return $models;
        return $attr_pro;
	}
	// cập nhật dữ liệu
	public function update_data($pro){
		$validate = request()->validate(
			[
				'name' => 'required',
				'price' => 'required',
				'cate_id' => 'required',
				'des' => 'required',
				'file'=>'max:10000|mimes:jpg,jpeg,png,gif'
			],
			[
				'required' => ':attribute is empty.',
				'unique' => ':attribute already exists',
				'min' => ':attribute is too small',
				'max' => 'Size image is too max',
				'mimes' => 'Incorrect image format'
			],
			[
                 'name' => 'Name',
                 'image' => 'Image',
                 'price' => 'Price',
                 'descriptions' => 'Description',
                 'cate_id' => 'Category',
                 'file' =>'Image'
			]
		);
		if(request()->code != $pro->code){
			$validate = request()->validate(
				[
					'code' => 'required|unique:products'
				],
				[
					'unique' => ':attribute already exists',
				],
				[
	                 'code' => 'Code',
				]
			);
		}
		$status = request()->status;
	    if($status){
	    	$status = 1;
	    }else{
	    	$status = 0;
	    }
	    $image = '';
		if(request() -> has('file')){
			$file = request() -> file;
			$file -> move(base_path('public/Uploads/products'),$file -> getClientOriginalName());
			$image = $file -> getClientOriginalName();
		}else{
			$image = $pro->image;
        }
		$updated = $this->update([
			'cate_id' => request()->cate_id,
			'code' => request()->code,
			'name' => request()->name,
			'slug' => Str::slug(request()->name),
			'price' => request()->price,
			'des' => request()->des,
			'image' => $image,
			'status' => $status,
        ]);

        productAttribute::where('products_id', $pro->id)->delete();

        if(request()->attribute_values) {
            foreach(request()->attribute_values as $value){
                $value = json_decode($value);
                $attr_pro = productAttribute::create([
                    'products_id' => $pro->id,
                    'attribute_id' => $value->attribute_id,
                    'attribute_value' => $value->id
                ]);
            }
        }
    }

    public function productAttr()
    {
        return $this->hasMany('App\Models\productAttribute', 'products_id', 'id');
    }
    public function getCat()
	{
		return $this->hasOne('App\Models\Categories','id','cate_id')->orderBy('created_at','desc');
    }
    function proNew(){
    	return products::where('status',1) -> orderby('created_at', 'DESC')->limit(4)->get();
    }
}
