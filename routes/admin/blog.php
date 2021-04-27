<?php
Route::group(['prefix' => 'blog', 'middleware'=>'hasPermission:6'],function(){
		//danh sách danh mục
		Route::get('/','blogController@list_blg')-> name('list-blog');
		// thêm danh mục
		Route::get('/add-blog','blogController@create') -> name('add');
		Route::post('/add-blog','blogController@store') -> name('add-blog');

		// sửa danh mục
		Route::get('edit-blog/{id}','blogController@edit') -> name('edit');
		Route::post('edit-blog/{id}','blogController@update') -> name('edit-blog');

		// xóa danh mục
		Route::get('delete-blog/{id}','blogController@delete')->name('delete-blog');
	});
 ?>
