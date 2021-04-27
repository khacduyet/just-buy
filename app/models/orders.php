<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\customer;
use App\Models\orders;
use App\Models\order_detail;
use Auth;

class orders extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'id','id_cus','name','phone','address','total_amount','total_quantity','status'
    ];
    // protected $primaryKey  = 'id_ord';
    //truy vấn database
    function getAllData(){
        $orders = orders::get();
        return $orders;
    }
    public function add(Cart $cart){
        $validate = request()->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ],
            [
                'required' => ':attribute đang bỏ trống.',
            ],
            [
                 'name' => 'Họ và tên',
                 'phone' => 'Số điện thoại',
                 'address' => 'Địa chỉ',
            ]
        );
        $id_cus = Auth::guard('customer')->user()->id;
        request()-> merge(['id_cus'=>Auth::guard('customer')->user()->id]);
        $orders = orders::create([
            'id_cus' => $id_cus,
            'name' => request()-> name,
            'phone' => request()-> phone,
            'address' => request()-> address,
            'total_amount' => $cart -> total_amount,
            'total_quantity' => $cart -> total_quantity,
            'status' => 0,
        ]);

        $datas = [];
        foreach ($cart->items as $item) {
            $datas[] = [
                'id_oder' => $orders -> id,
                'id_pro' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ];
        }
        order_detail::insert($datas);

    }
    public function getCus(){
        return $this -> hasOne('\App\Models\customer','id','id_cus');
    }
    public function detail(){
    	return $this -> hasMany('\App\Models\order_detail','id_oder','id');
    }
    public function countAll(){
        return count(Orders::get());
    }
    public function countSuc(){
        return count(Orders::where('status',2)->get());
    }
    public function countNew(){
        return count(Orders::where('status',0)->get());
    }
}
