<?php
Route::group(['prefix' => 'products', 'middleware'=>'hasPermission:4'],function(){
		//danh sách danh mục
		Route::get('/','productsController@list_pro')-> name('list-products');
		// thêm danh mục
		Route::get('/addproducts','productsController@create') -> name('add');
		Route::post('/addproducts','productsController@store') -> name('add-products');

		// sửa danh mục
		Route::get('editproducts/{id}','productsController@edit') -> name('edit');
		Route::post('editproducts/{id}','productsController@update') -> name('edit-products');

		// xóa danh mục
		Route::get('deleteproducts/{id}','productsController@delete')->name('deletePro');
	});
 ?>
