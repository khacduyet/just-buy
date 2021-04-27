<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\customer;
use App\Models\products;
use App\Models\orders;

class order_detail extends Model
{
    protected $table = 'order_detail';

    protected $fillable = [
        'id','id_oder','id_pro','quantity','price',
    ];
    public function getPro(){
    	return $this -> hasOne('\App\Models\products','id','id_pro');
    }

    //truy vấn database
    function getAllData(){
        $order_detail = order_detail::get();
        return $order_detail;
    }
}
