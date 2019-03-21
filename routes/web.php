<?php

Route::get('/', 'HomePageController@index');
Route::get('/about', 'HomePageController@about');
Route::get('/how-to-use', 'HomePageController@howToUse');
Route::get('/post/detail/{id}', 'HomePageController@detail');
Route::get('/by-category/{id}', 'HomePageController@categoryView');
Route::post('/search', 'HomePageController@search');
Route::get('/adPost', 'HomePageController@adPost');
Route::post('/adPost', 'PostController@store');

//user Registration
 Route::get('/register', 'RegisterController@index');
 Route::post('/register', 'RegisterController@store');
 
 // User Login
Route::get('login','SessionsController@index');
Route::post('login','SessionsController@store');
Route::get('logout','SessionsController@logout');

//user profile
Route::get('/profile', 'UserProfileController@index');
Route::get('/post/{id}', 'UserProfileController@viewPost');
Route::delete('/post/{id}', 'UserProfileController@deletePost');
Route::get('/post-edit/{id}', 'UserProfileController@editPost');
Route::post('/post-edit/{id}', 'UserProfileController@updatePost')->name('updatePost');


//Admin

Route::get('/admin/login', 'AdminUserController@index');
Route::post('/admin/login', 'AdminUserController@store');
Route::get('admin/dashboard', 'DashboardController@index');
Route::get('/admin/user', 'DashboardController@user');
Route::get('admin/logout','AdminUserController@logout');

//Resource route - Category
Route::resource('admin/category', 'CategoryController');
Route::resource('/admin/post', 'Admin\PostController');
Route::get('/published/{id}', 'Admin\PostController@published');
Route::get('/unpublished/{id}', 'Admin\PostController@unPublished');
//Route::get('/admin/', 'Admin\AdminUserController@index');

Auth::routes();