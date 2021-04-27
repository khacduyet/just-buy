<?php
Route::group(['prefix' => 'brand', 'middleware'=>'hasPermission:7'],function(){
		//danh sách danh mục
		Route::get('/','brandController@list_blg')-> name('list-brand');
		// thêm danh mục
		Route::get('/add-brand','brandController@create') -> name('add');
		Route::post('/add-brand','brandController@store') -> name('add-brand');

		// sửa danh mục
		Route::get('edit-brand/{id}','brandController@edit') -> name('edit');
		Route::post('edit-brand/{id}','brandController@update') -> name('edit-brand');

		// xóa danh mục
		Route::get('delete-brand/{id}','brandController@delete')->name('delete-brand');
	});
 ?>
