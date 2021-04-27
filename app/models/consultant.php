<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\consultant;

class consultant extends Model
{
    protected $table = 'consultant';

    protected $fillable = ['name','phone','email','status'];
    
    // thêm dữ liệu
    public function add(){
    	$validate = request()->validate(
			[
				'name' => 'required',
				'phone' => 'required',
			],
			[
				'required' => ':attribute is empty.',
			],
			[
                 'name' => 'Name',
                 'phone' => 'Phone',
			]
		);
		 $models = $this->create([
			'name' => request()->name,
			'phone' => request()->phone,
			'email' => request()->email,
			'status' => 0,
		]);
		return $models;

	}
	// cập nhật dữ liệu
	public function update_data(){
		$updated = $this->update([
			'status' => 1,
		]);
	}

    public function countSuc(){
        return count(consultant::where('status',1)->get());
    }
}
