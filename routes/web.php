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

use Spatie\Analytics\Period;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function(){
  return view('welcome');
});
Route::get('subscribe/iban', function(){
  return view('subscribe/iban');
});
Route::get('subscribe/creditcard', function(){
  return view('subscribe/creditcard');
});

Route::get('/write','CategoryController@index');
Route::post('/posts','ArticleController@store');
Route::post('/comment','CommentController@store');
Route::post('subscribe/iban','MachtigingController@store');
Route::post('subscribe/creditcard','MachtigingController@store2');
Route::get('/excel','MachtigingController@index');


Route::resource('category', 'CategoryController');
Route::resource('article','ArticleController');

Route::get('/titles', 'ArticleController@index');
Route::get('/titles/{title}', 'ArticleController@show');
Route::post('/titles', 'ArticleController@store2');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/subscribe', function () {
    return view('/subscribe/pre_subscribe');
});
Route::post('/subscribe/index', 'SubscriptionController@index');

Route::get('/querytest', function () {
    return view('/querytest/index');
});

Route::post('/querytest/index', 'QuerytestController@store');
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

Route::get('/data', function(){
  $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
  dd($analyticsData);
});

Route::get('events', 'EventController@index')->name('events.index')->middleware('auth');
Route::post('events', 'EventController@addEvent')->name('events.add')->middleware('auth');

Route::get('calendar', 'CalendarController@index')->name('calendar');

// Route::get('posts', 'HomeController@posts')->name('posts');
Route::post('/vote', 'ArticleController@postPost')->middleware('auth');
// Route::get('posts/{id}', 'HomeController@show')->name('posts.show');

// Download Route
Route::get('download/test1.xlsx', function()
{
  $filename = 'test1.xlsx';
    // Check if file exists in app/storage/file folder
    $file_path = storage_path() .'/file/'. $filename;
    if (file_exists($file_path))
    {
        // Send Download
        return Response::download($file_path, $filename, [
            'Content-Length: '. filesize($file_path)
        ]);
    }
    else
    {
        // Error
        exit('Requested file does not exist on our server!');
    }
});


Route::get('pos', function () {
    return view('pos');
});

Route::get('pos2', function () {
    return view('pos2');
});
