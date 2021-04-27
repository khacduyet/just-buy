<?php

	Route::group(['prefix' => 'admin', 'middleware'=>'hasPermission:1'],function(){
		//danh sách admin
		Route::get('/','adminController@list_ad') -> name('list-admin');

		// thêm admin
		Route::get('/add-admin','adminController@create') -> name('add');
		Route::post('/add-admin','adminController@store') -> name('add-admin');

		// sửa admin
		Route::get('edit-admin/{id}','adminController@edit') -> name('edit');
		Route::post('edit-admin/{id}','adminController@update') -> name('edit-admin');

		// xóa admin
		Route::get('delete-admin/{id}','adminController@delete')->name('deletead');
	});
 ?>
