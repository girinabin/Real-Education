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

// Route::get('/home', function () {
//     return view('cd-admin.home.home');
// });


Auth::routes();
// About us
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about','AboutController@aboutcreate')->name('about.create');
Route::get('/aboutshow','AboutController@aboutshow')->name('about.show');
Route::post('/aboutstore','AboutController@aboutstore')->name('about.store');
Route::post('/aboutupdate','AboutController@aboutupdate')->name('about.update');

// Services
Route::get('/service','ServiceController@servicecreate')->name('service.create');
Route::post('/servicestore','ServiceController@servicestore')->name('service.store');
Route::get('/serviceindex','ServiceController@serviceindex')->name('service.index');
Route::post('/serviceupdate/{serv}','ServiceController@serviceupdate')->name('service.update');
Route::get('/serviceshow/{serv}','ServiceController@serviceshow')->name('service.show');
Route::post('/servicestatus{serv}','ServiceController@servicestatus')->name('service.status');
Route::post('/servicedestroy/{serv}','ServiceController@servicedestroy')->name('service.destroy');

// Study Abroad

Route::get('/abroad','StudyAbroadController@abroadcreate')->name('abroad.create');
Route::post('/abroadstore','StudyAbroadController@abroadstore')->name('abroad.store');
Route::get('/abroadindex','StudyAbroadController@abroadindex')->name('abroad.index');
Route::get('/abroadshow/{abr}','StudyAbroadController@abroadshow')->name('abroad.show');
Route::post('/abroadstatus{abr}','StudyAbroadController@abroadstatus')->name('abroad.status');
Route::post('/abroadupdate/{abr}','StudyAbroadController@abroadupdate')->name('abroad.update');
Route::post('/abroaddestroy/{abr}','StudyAbroadController@abroaddestroy')->name('abroad.destroy');


// Test Preparation
Route::get('/testp','TestPreparationController@testpcreate')->name('testp.create');
Route::post('/testpstore','TestPreparationController@testpstore')->name('testp.store');

Route::get('/testpindex','TestPreparationController@testpindex')->name('testp.index');
Route::post('/testpstatus/{tst}','TestPreparationController@testpstatus')->name('testp.status');
Route::get('/testpshow/{tst}','TestPreparationController@testpshow')->name('testp.show');
Route::post('/testpdestroy/{tst}','TestPreparationController@testpdestroy')->name('testp.destroy');
Route::post('/testpupdate/{tst}','TestPreparationController@testpupdate')->name('testp.update');









