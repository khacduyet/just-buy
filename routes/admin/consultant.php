<?php
Route::group(['prefix' => 'consultant'],function(){
		//danh sách
		Route::get('/','consultantController@list_con')-> name('list-consultant');
		// sửa
		Route::post('edit-consultant/{id}','consultantController@update') -> name('edit-consultant');
	});
 ?>
