<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\products;
use App\Models\brand;
use App\Models\blog;
use App\Models\banner;
use App\Models\Cart;
use App\Models\Config;
use App\Models\orders;
use App\Models\order_detail;
use App\Models\construction;
use App\Models\productAttribute;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use File;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller {

    public function __construct(){
        $this->middleware(function($request,$next){
            view()->share([
                'categories' => Categories::all(),
                'banners' => banner::where('status',1)->get(),
                'brand' => brand::all(),
                'config' => Config::all(),
                'cart' => new cart(),
            ]);
            return $next($request);
        });
    }
    public function home(Products $pro) {
        $products = products::all();
        $blog = blog::all();
        $con = construction::all();
        $productNew = $pro->proNew();
        return view('pages.client.home',compact('products','blog','con','productNew'));
    }
    public function about(Products $pro) {
        $productNew = $pro->proNew();
        return view('pages.client.about',compact('productNew'));
    }
    public function product(Request $request) {
        $products = products::where('status',1)->paginate(8);
        return view('pages.client.product',compact('products'));
    }
    public function service() {
        return view('pages.client.service');
    }
    public function construction() {
        $con = construction::all();
        return view('pages.client.construction',compact('con'));
    }
    public function contact() {
        return view('pages.client.contact');
    }
    public function my_account() {
        if(Auth::guard('customer')->check()){
            $orders = orders::where('id_cus',Auth::guard('customer')->user()->id)
                ->orderBy('created_at','desc')
                ->get();
            return view('pages.client.my-account',[
                'orders' => $orders,
            ]);
        }
        else{
            return redirect() -> route('login_user');
        }
    }

    public function product_detail($slug) {
        $pro = products::where('slug',$slug)->first();
        $productAttributes = $pro->productAttr()->get()->all();
        // danh sach product attribute cua san pham khong bi trung lap
        $uniqueAttributes = [];
        // danh sach attribute_id cua san pham khong bi trung lap
        $uniqueAttributeIds = [];
        foreach($productAttributes as $pa) {
            if(!in_array($pa->attribute_id, $uniqueAttributeIds)) {
                array_push($uniqueAttributes, $pa);
                array_push($uniqueAttributeIds, $pa->attribute_id);
            }
        }
        $productAttributeValues = array_map(function($var) {
            return $var->attribute_value;
        },  $productAttributes);
        $productNew = $pro->proNew();
        return view('pages.client.product-detail',compact('pro', 'uniqueAttributes', 'productAttributeValues','productNew'));
    }
    public function blog_detail($slug) {
        $detail = blog::where('slug',$slug)->first();
        $blg = blog::all();
        return view('pages.client.blog-detail',compact('detail','blg'));
    }
    public function cate_product($slug) {
        $cate = categories::where('slug',$slug)->first() ;
        $products = products::where('cate_id',$cate['id'])->paginate(4);
        return view('pages.client.cate-product',compact('products','cate'));
    }
    public function getsearch(Request $req){
        $products =  products::where('name','like','%'.$req->key.'%')->orWhere('price',$req->key)->get();
        return view('pages.client.search',compact('products'));
    }

    public function filter(Request $req)
    {
        if ($req->order == 0) {
            $order = 'desc';
        } else {
            $order = 'asc';
        }
        $price = [$req->price,$req->price2];
        $products = products::where('cate_id',$req->cate)->whereBetween('price',$price)->orderBy('price',$order)->paginate(8);
        $giatri = $req->price;
        $cate = $req->cate;
        $error = "";
        $categories = Categories::all();
        $brand = brand::all();
        $order = $req->order;
        $count = count($products);

        return view('pages.client.shop',[
            'products' => $products,
            'error' => $error,
            'count' => $count,
            'giatri1' => $giatri,
            'cateid' => $cate,
            'order' => $order,
            'count' => $count
        ]);
    }

    public function info_account($id) {
        $customer= Customer::where('id',$id)->first();
        return view('pages.client.info-account',compact('customer'));
    }

    public function edit_account($id,Request $request) {
        $validate = request()->validate(
			[
                'password_old' => 'required',
                'password_new' => 'required|min:6',
                'confirm' => 'required|same:password_new'
			],
			[
				'required' => ':attribute đang bỏ trống.',
                'min' => ':attribute phải trên 6 ký tự',
                'same' => ':attribute phải giống mật khẩu'
			],
			[
                'password_old' => 'Mật khẩu cũ',
                 'password_new' => 'Mật khẩu mới',
                 'confirm' => 'Xác nhận mật khẩu'
			]
        );
        $customer= Customer::where('id',$id)->first();
        $password_old = Hash::make($request->password_old);

        if(!Hash::check($request->password_old,$customer->password)) {
            Session::flash('message', "Mật khẩu cũ không đúng");
            return redirect()->back();
        } else {
            $customer->password = Hash::make($request->password_new);
            $customer->save();
             return redirect('/account/log-out');
        }

    }
}
