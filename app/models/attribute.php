<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\attributeValue;
use App\Models\productAttribute;
use DB;

class attribute extends Model
{
    protected $table = 'attributes';

    protected $fillable = ['name'];

    // thêm dữ liệu
    public function add(){
		$models = $this->create([
			'name' => request()->name,
		]);
		return $models;
	}
	// cập nhật dữ liệu
	public function update_data(){
		if(request()->name){
			$name = request()->name;
		}else{
			$name = $id->name;
		}
		$updated = $this->update([
			'name' => $name
		]);
    }
    public function deleteAttValue($value){
    	$attValue = attributeValue::where('attribute_id',$value->id)->delete();
    }
    public function deleteProAtt($value){
        $ProAtt = productAttribute::where('attribute_id',$value->id)->delete();
    }
    public function attrValue()
    {
        return $this->hasMany('App\Models\attributeValue');
    }

    public function getAttValue()
	{
		return $this->hasOne('App\Models\attributeValue','attribute_id','id')->orderBy('created_at','desc');
	}
}
