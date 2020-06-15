<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/{course}.html', 'HomeController@show');

Route::prefix('admin')->group(function () {
  Route::get('/', 'Dashboard@index');

  Route::get('/category.html', 'CategoryController@index');
  Route::get('/category/create.html', 'CategoryController@create');
  Route::post('/category/create.js', 'CategoryController@store');
  Route::delete('/category/{category}/delete.js', 'CategoryController@destroy');

  Route::get('/course.html', 'CourseController@index');
  Route::get('/course/create.html', 'CourseController@create');
  Route::post('/course/create.js', 'CourseController@store');
  Route::delete('/course/{course}/delete.js', 'CourseController@destroy');
  Route::get('/course/{course}/update.html', 'CourseController@edit');
  Route::put('/course/{course}/update.js', 'CourseController@update');

  Route::get('/products.html', 'ProductController@index');
  Route::get('/products/create.html', 'ProductController@create');
  Route::post('/products/create.js', 'ProductController@store');
  Route::delete('/products/{product}/delete.js', 'ProductController@destroy');

  Route::get('/details.html', 'DetailController@index');
  Route::get('/details/create.html', 'DetailController@create');
  Route::post('/details/create.js', 'DetailController@store');
  Route::delete('/details/{detail}/delete.js', 'DetailController@destroy');

  Route::get('/login', 'Dashboard@create');
  Route::get('/logout.js', 'Dashboard@destroy');

  Route::post('/login', 'Dashboard@login');
});
