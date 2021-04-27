<?php
	Route::group(['prefix' => 'attr_product', 'middleware'=>'hasPermission:5'],function(){
        //danh sách danh mục

        Route::get('/','attrProductController@list_attrProduct') -> name('list-attrProduct');

	})
 ?>
