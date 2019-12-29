<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/index','IndexController@index');
Route::get('/','IndexController@home');
Route::get('/about','IndexController@about');
Route::get('/contact','IndexController@contact');

//category crud are here.....
Route::get('/add_category','CategoryController@AddCategory')->name('add.category');
Route::get('/all_category','CategoryController@AllCategory')->name('all.category');
Route::post('/store/category','CategoryController@StoreCategory')->name('store.category');
Route::get('/view/category/{id}','CategoryController@ViewCategory');
Route::get('/delete/category/{id}','CategoryController@DeleteCategory');
Route::get('/edit/category/{id}','CategoryController@EditCategory');
Route::post('/update/category/{id}','CategoryController@UpdateCategory');

//post crud are here.....

Route::get('/create','PostController@write')->name('create.post');
Route::post('/store/post','PostController@StorePost')->name('store.post');
Route::get('/post','PostController@AllPost')->name('post');
Route::get('/view/post/{id}','PostController@ViewPost');
Route::get('/edit/post/{id}','PostController@EditPost');
Route::post('/update/post/{id}','PostController@Updatepost');
Route::get('/delete/post/{id}','PostController@DeletePost');
/*
//student crud are here.....
Route::get('/student', 'StudentController@index')->name('student');
Route::post('store/student', 'StudentController@StoreStudent')->name('store.student');
Route::get('/all/student', 'StudentController@allstudent')->name('all.student');
Route::get('/view/student/{id}','StudentController@Viewstudent');
Route::get('/delete/student/{id}','StudentController@destroy');
Route::get('/edit/student/{id}','StudentController@edit');
Route::post('/update/student/{id}','StudentController@update');
*/
Route::resource('student','StudentController');
