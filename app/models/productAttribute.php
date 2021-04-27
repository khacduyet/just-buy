<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\products;

class productAttribute extends Model
{
    protected $table = 'product_attribute';

    protected $fillable = ['products_id','attribute_id','attribute_value'];

    public function getAtt()
	{
		return $this->hasOne('App\Models\attribute','id','attribute_id')->orderBy('created_at','desc');
	}
    public function getPro()
	{
		return $this->hasOne('App\Models\Products','id','products_id')->orderBy('created_at','desc');
    }
    public function attribute() {
        return $this->belongsTo('App\Models\attribute','attribute_id','id');
    }
    public function attributeValue() {
        return $this->belongsTo('App\Models\attributeValue','attribute_value','id');
    }
}
