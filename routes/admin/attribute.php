<?php

	Route::group(['prefix' => 'attribute', 'middleware'=>'hasPermission:5'],function(){
        //danh sách danh mục

        Route::get('attrName','attrNameController@list_attrName') -> name('list-attrName');

		// thêm danh mục
		Route::get('/addAttrName','attrNameController@create') -> name('add-name-attr');
		Route::post('/addAttrName','attrNameController@store') -> name('add-attrName');

		// sửa danh mục
		Route::get('editAttrName/{id}','attrNameController@edit') -> name('edit');
		Route::post('editAttrName/{id}','attrNameController@update') -> name('edit-attrName');

		// xóa danh mục
		Route::get('deleteAttrName/{id}','attrNameController@delete')->name('delete-attrName');
	});
 ?>
