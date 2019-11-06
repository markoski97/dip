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
Route::get('/', function () {
    return view('welcome');

});
Route::get('/proba', function () {
    return view('proba');
});

Route::get('/informacii', 'PagesController@getInformacii');

Route::get('/pocetna', 'PagesController@getHome');

Route::get('/main', 'PagesController@getMain');

Route::get('/contact', 'PagesController@getContact');

Route::post('/contact', 'PagesController@postContact');

Route::resource('akcii','AkciiController');

Route::resource('proizvodi','ProizvodiController');

Route::resource('pdf','PdfController');

Route::resource('galerija','GalleryController');

Route::resource('laminat','LaminatController');

Route::resource('ostanato','OstanatoController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
