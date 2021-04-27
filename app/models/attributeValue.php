<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class attributeValue extends Model
{
    protected $table = 'attribute_values';

    protected $fillable = ['attribute_id','value'];

    // thêm dữ liệu
    public function add(){
		$models = $this->create([
            'attribute_id' => request()->attr_name,
            'value' => request()->value,
		]);
		return $models;
	}
	// cập nhật dữ liệu
	public function update_data(){
		if(request()->attr_name && request()->value){
            $attr_name = request()->attr_name;
            $value = request()->value;
		}else{
            $attr_name = $id->attr_name;
            $value = $id->value;
		}
		$updated = $this->update([
            'attr_name' => $attr_name,
            'value' => $value
		]);
    }
    public function attribute()
    {
        return $this->belongsTo('App\Models\attribute');
    }
}
