<?php


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


// Gallery
Route::get('/album','AlbumController@albumcreate')->name('album.create');
Route::post('/albumstore','AlbumController@albumstore')->name('album.store');
Route::get('/albumindex','AlbumController@albumindex')->name('album.index');
Route::post('/albumstatus/{alb}','AlbumController@albumstatus')->name('album.status');
Route::post('/imagestatus/{img}','AlbumController@imagestatus')->name('image.status');


Route::post('/albumdestroy/{alb}','AlbumController@albumdestroy')->name('album.destroy');
Route::get('/image/{id}','AlbumController@imagecreate')->name('image.create');
Route::get('/albumshow/{alb}','AlbumController@albumshow')->name('album.show');
Route::post('/imagestore','AlbumController@imagestore')->name('image.store');
Route::post('/imagedestroy/{img}','AlbumController@imagedestroy')->name('image.destroy');

// Review
Route::get('/review','ReviewController@reviewcreate')->name('review.create');
Route::post('/reviewstore','ReviewController@reviewstore')->name('review.store');
Route::get('/reviewindex','ReviewController@reviewindex')->name('review.index');
Route::post('/reviewstatus/{rev}','ReviewController@reviewstatus')->name('review.status');
Route::get('/reviewshow/{rev}','ReviewController@reviewshow')->name('review.show');
Route::post('/reviewupdate/{rev}','ReviewController@reviewupdate')->name('review.update');
Route::post('/reviewdestroy/{rev}','ReviewController@reviewdestroy')->name('review.destroy');

// Carousel
Route::get('/carousel','CarouselController@carouselcreate')->name('carousel.create');
Route::post('/carouselstore','CarouselController@carouselstore')->name('carousel.store');
Route::get('/carouselindex','CarouselController@carouselindex')->name('carousel.index');
Route::post('/carouselstatus/{car}','CarouselController@carouselstatus')->name('carousel.status');
Route::get('/carouselshow/{car}','CarouselController@carouselshow')->name('carousel.show');
Route::post('/carouseldestroy/{car}','CarouselController@carouseldestroy')->name('carousel.destroy');

// Why Us

Route::get('/choose','ChooseController@choosecreate')->name('choose.create');
Route::post('/choosestore','ChooseController@choosestore')->name('choose.store');
Route::get('/chooseindex','ChooseController@chooseindex')->name('choose.index');
Route::post('/choosestatus/{cho}','ChooseController@choosestatus')->name('choose.status');
Route::post('/chooseupdate/{cho}','ChooseController@chooseupdate')->name('choose.update');
Route::get('/chooseshow/{cho}','ChooseController@chooseshow')->name('choose.show');
Route::post('/choosedestroy/{cho}','ChooseController@choosedestroy')->name('choose.destroy');

// Event
Route::get('/event','EventController@eventcreate')->name('event.create');
Route::post('/eventstore','EventController@eventstore')->name('event.store');
Route::get('/eventindex','EventController@eventindex')->name('event.index');
Route::post('/eventstatus/{eve}','EventController@eventstatus')->name('event.status');
Route::get('/eventshow/{eve}','EventController@eventshow')->name('event.show');
Route::post('/eventupdate/{eve}','EventController@eventupdate')->name('event.update');
Route::post('/eventdestroy/{eve}','EventController@eventdestroy')->name('event.destroy');

// EventRegistration

Route::get('/eregister','EventRegistrationController@eregistercreate')->name('eregister.create');
Route::post('/eregisterstore','EventRegistrationController@eregisterstore')->name('eregister.store');
Route::get('/eregisterindex','EventRegistrationController@eregisterindex')->name('eregister.index');
Route::get('/eregistershow/{er}','EventRegistrationController@eregistershow')->name('eregister.show');
Route::post('/eregisterdestroy/{er}','EventRegistrationController@eregisterdestroy')->name('eregister.destroy');
Route::get('/eregistercompose/{er}','EventRegistrationController@eregistercompose')->name('eregister.compose');
Route::get('/eregistercompose1','EventRegistrationController@eregistercompose1')->name('eregister.compose1');

Route::post('/eregisterreply/{er}','EventRegistrationController@eregisterreply')->name('eregister.reply');
Route::post('/eregisterreply','EventRegistrationController@eregisterreply1')->name('eregister.reply1');
Route::get('/eregistersentmsg','EventRegistrationController@eregistersentmsg')->name('eregister.sentmsg');
Route::post('/einboxdestroy/{eve}','EventRegistrationController@einboxdestroy')->name('einbox.destroy');
Route::post('/esentdestroy/{eve}','EventRegistrationController@esentdestroy')->name('esent.destroy');




// Message

Route::get('/eregistercompose/{er}','EventRegistrationController@eregistercompose')->name('eregister.compose');
Route::get('/eregistercompose1','EventRegistrationController@eregistercompose1')->name('eregister.compose1');

Route::post('/eregisterreply/{er}','EventRegistrationController@eregisterreply')->name('eregister.reply');
Route::post('/eregisterreply','EventRegistrationController@eregisterreply1')->name('eregister.reply1');
Route::get('/eregistersentmsg','EventRegistrationController@eregistersentmsg')->name('eregister.sentmsg');

Route::get('/message','MessageController@messagecreate')->name('message.create');
Route::get('/messageindex','MessageController@messageindex')->name('message.index');
Route::post('/messagestore','MessageController@messagestore')->name('message.store');
Route::get('/messageshow/{msg}','MessageController@messageshow')->name('message.show');
Route::get('/messagecompose/{msg}','MessageController@messagecompose')->name('message.compose');
Route::post('/messagereply','MessageController@messagereply')->name('message.reply');
Route::get('/messagesent','MessageController@messagesent')->name('message.sent');
Route::get('/messagesentshow/{msg}','MessageController@messagesentshow')->name('message.sentshow');
Route::post('/inboxdestroy/{msg}','MessageController@inboxdestroy')->name('inbox.destroy');
Route::post('/sentdestroy/{msg}','MessageController@sentdestroy')->name('sent.destroy');

























