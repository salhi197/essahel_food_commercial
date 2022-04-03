<?php

Route::group(['middleware' => 'auth'], function () 
{

	Route::get('/client/edit_prix/{id_client}','ClientController@edit_prix');
	Route::post('/client/edit_prix/{id_client}/edit','ClientController@edit_prix_post');



	//
});	