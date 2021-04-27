<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class config extends Model
{
    protected $table = 'config';

    protected $fillable = ['name','value'];
    
    // thêm dữ liệu
    public function add(){
    	$validate = request()->validate(
			[
				'name' => 'required|unique:config',
				'value' => 'required',
			],
			[
				'required' => ':attribute is empty.',
				'unique' => ':attribute already exists.',
			],
			[
                 'name' => 'Name',
                 'value' => 'Value',
			]
		);
		 $models = $this->create([
			'name' => request()->name,
			'value' => request()->value,
		]);
		return $models;

	}
	// cập nhật dữ liệu
	public function update_data($con){
		$validate = request()->validate(
			[
				'value' => 'required',
			],
			[
				'required' => ':attribute is empty.',
			],
			[
                 'value' => 'Value',
			]
		);
		$updated = $this->update([
			'value' => request()->value,
		]);
	}
}
