<?php

	Route::group(['prefix' => 'categories', 'middleware'=>'hasPermission:3'],function(){
		//danh sách danh mục
		Route::get('/','categoriesController@list_cat') -> name('list-categories');
		// thêm danh mục
		Route::get('/addcategories','categoriesController@create') -> name('add');
		Route::post('/addcategories','categoriesController@store') -> name('add-categories');

		// sửa danh mục
		Route::get('editcategories/{id}','categoriesController@edit') -> name('edit');
		Route::post('editcategories/{id}','categoriesController@update') -> name('edit-categories');

		// xóa danh mục
		Route::get('deletecategories/{id}','categoriesController@delete')->name('deleteCat');
	});
 ?>
