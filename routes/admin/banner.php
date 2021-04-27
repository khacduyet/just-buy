<?php
Route::group(['prefix' => 'banner', 'middleware'=>'hasPermission:8'],function(){
		//danh sách danh mục
		Route::get('/','bannerController@list_ban')-> name('list-banner');
		// thêm danh mục
		Route::get('/add-banner','bannerController@create') -> name('add');
		Route::post('/add-banner','bannerController@store') -> name('add-banner');

		// sửa danh mục
		Route::get('edit-banner/{id}','bannerController@edit') -> name('edit');
		Route::post('edit-banner/{id}','bannerController@update') -> name('edit-banner');

		// xóa danh mục
		Route::get('delete-banner/{id}','bannerController@delete')->name('delete-banner');
	});
 ?>
