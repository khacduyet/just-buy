<?php
Route::group(['prefix' => 'config', 'middleware'=>'hasPermission:12'],function(){
		//danh sách danh mục
		Route::get('/','configController@list_con')-> name('list-config');
		Route::get('/manager-about','configController@about')-> name('list-about');
		Route::get('/manager-service','configController@service')-> name('list-service');
		// thêm danh mục
		Route::get('/add-config','configController@create') -> name('add');
		Route::post('/add-config','configController@store') -> name('add-config');

		// sửa danh mục
		Route::get('edit-config/{id}','configController@edit') -> name('edit');
		Route::post('edit-config/{id}','configController@update') -> name('edit-config');

		// xóa danh mục
		Route::get('delete-config/{id}','configController@delete')->name('delete-config');
	});
 ?>
