<?php

Route::get('/', function () {
    return view('home');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/show-book/{id}', 'HomeController@showBook')->name('show_book');
Route::get('search', 'searchController@search')->name('search');
Route::get('get-result', 'searchController@getResult')->name('get_result');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('authors', 'AuthorController@index')->name('author');
    Route::get('create-author', 'AuthorController@create')->name('create_author');
    Route::post('store-author', 'AuthorController@store')->name('store_author');
    Route::get('edit-author/{id}', 'AuthorController@edit')->name('edit_author');
    Route::put('update-author/{id}', 'AuthorController@update')->name('update_author');
    Route::get('remove-author/{id}', 'AuthorController@remove')->name('remove_author');

    Route::get('books', 'BookController@index')->name('books');
    Route::get('create-book', 'BookController@create')->name('create_book');
    Route::post('store-book', 'BookController@store')->name('store_book');
    Route::get('remove-book/{id}', 'BookController@remove')->name('remove_book');
    Route::get('edit-book/{id}', 'BookController@edit')->name('edit_book');
    Route::put('update-book/{id}', 'BookController@update')->name('update_book');

    Route::get('books_borrowed', 'BookBorrowedController@index')->name('books_borrowed');

    Route::get('users', 'UserController@index')->name('users');
    Route::get('create-user', 'UserController@create')->name('create_user');
    Route::put('update-user/{id}', 'UserController@update')->name('update_user');
    Route::post('store-user', 'UserController@store')->name('store_user');
    Route::get('edit-user/{id}', 'UserController@edit')->name('edit_user');
    Route::get('make-admin-user/{id}', 'UserController@makeAdmin')->name('make_admin_user');
    Route::get('remove-user/{id}', 'UserController@remove')->name('remove_user');
    Route::get('make-block/{id}', 'UserController@makeBlock')->name('make_block');

    Route::get('categories', 'CategoryController@index')->name('categories');
    Route::get('create-category', 'CategoryController@create')->name('create_category');
    Route::post('store-category', 'CategoryController@store')->name('store_category');
    Route::get('remove-category/{id}', 'CategoryController@remove')->name('remove_category');

    Route::get('settings', 'SettingController@index')->name('settings');
    Route::put('update-settings', 'SettingController@update')->name('update_settings');
});

Route::group(['middleware' => ['auth', 'student']], function () {
    Route::get('borrow-book/{id}', 'BookBorrowedController@borrowBook')->name('borrow_book');
    Route::get('my-books', 'BookBorrowedController@getMyLists')->name('my_list');
    Route::get('edit-profile/{id}', 'ProfileController@edit')->name('edit_profile');
    Route::put('update-profile/{id}', 'ProfileController@update')->name('update_profile');
});