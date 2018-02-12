<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('authors', 'AuthorController@index')->name('author');
Route::get('create-author', 'AuthorController@create')->name('create_author');
Route::post('store-author', 'AuthorController@store')->name('store_author');
Route::get('edit-author/{id}', 'AuthorController@edit')->name('edit_author');
Route::put('update-author/{id}', 'AuthorController@update')->name('update_author');
Route::get('remove-author/{id}', 'AuthorController@remove')->name('remove_author');

Route::get('books', 'BookController@index')->name('books');
Route::get('books_borrowed', 'BookBorrowedController@index')->name('books_borrowed');

Route::get('users', 'UserController@index')->name('users');
Route::get('create-user', 'UserController@create')->name('create_user');

Route::get('categories', 'CategoryController@index')->name('categories');
Route::get('create-category', 'CategoryController@create')->name('create_category');
