<?php
Route::group(['prefix' => 'customer', 'middleware'=>'hasPermission:2'],function(){
		//danh sách danh mục
        Route::get('/','customerController@list_cus')-> name('list-customer');

        Route::get('/order-cus','orderAdminController@list_order') -> name('order-customer');
        Route::get('/order-details/{id}','orderAdminController@detail') -> name('ord-detail');
        Route::get('confirm-order/{id}','orderAdminController@confirm_order')->name('confirm-order');
        Route::get('complete-order/{id}','orderAdminController@complete_order')->name('complete-order');
	});
 ?>
