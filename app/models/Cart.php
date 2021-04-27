<?php

	use Illuminate\Http\Request;
	use App\Http\Requests;

	namespace App\Models;
	/**
	 * summary
	 */
	class Cart
	{
	    public $items = [];
	    public $total_quantity = 0;
	    public $total_amount = 0;
	    public function __construct()
	    {
			$this->items = session('cart');
	        if(isset($this->items)){

	        	$this->total_quantity = $this->total_quantity($this->items);
	        	$this->total_amount = $this->total_amount($this->items);
	        }
	    }

	    //thêm sản phẩm
	    public function add($models){
	    	if(isset($this->items[$models->id])){
	    		$this->items[$models->id]['quantity'] +=1;

	    	}else{
	    		$this -> items[$models->id] = [
		    		'id' => $models->id,
		    		'name' => $models->name,
		    		'slug' => $models->slug,
		    		'price' => $models->price,
		    		'quantity' => 1,
		    		'image' => $models ->image,

		    	];
	    	}

	    	session(['cart'=>$this->items]);
	    }

	    public function delete($id){
	    	if (isset($this->items[$id])) {
	    		unset($this->items[$id]);
	    	}

	    	session(['cart'=>$this->items]);
	    }

	    public function update($id,$quantity){
	    	if(isset($this->items[$id])){
	    		$this->items[$id]['quantity'] = $quantity;

	    	}

	    	session(['cart'=>$this->items]);
	    }

	    public function clear(){
	    	session(['cart'=>[]]);
	    }

	    protected function total_quantity($items){
	    	// dd($items);
	    	$t =0;
	    	foreach ($items as $item) {
	    		$t += $item['quantity'];
	    	}
	    	return $t;
	    }

	    protected function total_amount($items){
	    	$t =0;
	    	foreach ($items as $item) {
	    		$t += $item['quantity']*$item['price'];
	    	}
	    	return $t;
	    }

	};


 ?>
