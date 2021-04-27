<?php
Route::group(['prefix' => 'construction', 'middleware'=>'hasPermission:9'],function(){
		//danh sách danh mục
		Route::get('/','constructionController@list_con')-> name('list-construction');
		// thêm danh mục
		Route::get('/add-construction','constructionController@create') -> name('add');
		Route::post('/add-construction','constructionController@store') -> name('add-construction');

		// sửa danh mục
		Route::get('edit-construction/{id}','constructionController@edit') -> name('edit');
		Route::post('edit-construction/{id}','constructionController@update') -> name('edit-construction');

		// xóa danh mục
		Route::get('delete-construction/{id}','constructionController@delete')->name('delete-construction');
	});
 ?>
