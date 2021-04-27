<?php

	Route::group(['prefix' => 'attr_values', 'middleware'=>'hasPermission:5'],function(){
        //danh sách danh mục

        Route::get('/','attrValueController@list_attrValue') -> name('list-attrValue');

		// thêm danh mục
		Route::get('/addAttrValue','attrValueController@create') -> name('add-value-attr');
		Route::post('/addAttrValue','attrValueController@store') -> name('add-attrValue');

		// sửa danh mục
		Route::get('editAttrValue/{id}','attrValueController@edit') -> name('edit');
		Route::post('editAttrValue/{id}','attrValueController@update') -> name('edit-attrValue');

		// xóa danh mục
		Route::get('deleteAttrValue/{id}','attrValueController@delete')->name('delete-attrValue');
	});
 ?>
