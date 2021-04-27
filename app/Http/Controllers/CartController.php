<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Cart;
use App\Models\Products;
use App\Models\Config;

class CartController extends Controller
{
     public function __construct(){
        $this->middleware(function($request,$next){
            view()->share([
                'categories' => Categories::all(),
                'config' => Config::all(),
                'cart' => new cart()
            ]);
            return $next($request);
        });
    }

    public function add_cart($id,Cart $cart){
        $models = Products::where('id', $id)->first();

        if($models){
            $cart -> add($models);

            return redirect() -> route('cart') -> with('success','Add to cart successfully');
        }else{
            return redirect() -> back();
        }
    }

    public function cart() {
        return view('pages.client.cart',[
            'cart'=> new cart(),
        ]);
    }

    function delete_cart($id,Cart $cart){
        $cart -> delete($id);

        return redirect() -> back() -> with('success','Deleted successful');
    }

    function update_cart($id,Cart $cart){
        $quantity = request()->number;
        $cart -> update($id,$quantity);
    }
    function clear_cart(Cart $cart){
        $cart -> clear();
        return redirect() -> route('cart') -> with('success','Deleted successful');
    }
}
