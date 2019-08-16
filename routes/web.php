<?php
use Carbon\Traits\Rounding;
use App\Http\Controllers\firstController;

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

Route::get('/', function () {
    return view('statics.home');
});

Route::get('home', 'firstController@home')->name('home');
Route::get('about', 'firstController@about')->name('about');
Route::get('gallery', 'firstController@gallery')->name('gallery');
Route::get('contact', 'firstController@contact')->name('contact');
Route::get('collection', 'MovieController@movie')->name('collection');
Route::get('details/{id}', 'MovieController@movieDetails')->name('details');
Route::get('search', 'MovieController@searchMovie')->name('search');
Route::get('showtrailer/{id}', 'MovieController@showTrailer')->name('showtrailer');
Route::get('story', 'firstController@story')->name('story');

Route::resource('articles', 'articlesController');
Route::resource('comments', 'CommentController', ['only'=>['store']]);

Auth::routes();

Route::group(['middleware' => ['auth','role:manager']], function () {
    Route::get('manager', 'ManagerController@index')->name('manager');
    Route::get('list', 'ManagerController@list')->name('manager.list');
    Route::get('htmltopdfview', 'ManagerController@htmltopdfview')->name('manager.htmltopdfview');
    Route::get('export', 'ManagerController@export')->name('manager.export');
    Route::get('import', 'ManagerController@import')->name('manager.import');
});

Route::group(['middleware' => ['auth','role:employee']], function () {
    Route::get('employee', 'EmployeeController@index')->name('employee');
});