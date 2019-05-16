<?php

/**
 * Frontend Controllers
 */
Route::post('auth/password/profile', 'PasswordController@changeProfile');
get('/', 'FrontendController@index')->name('home');

get('/single-advert/{advert_id}', 'FrontendController@single_advert');

post('auth/password/profile', 'PasswordController@changeProfile');
post('/edit/ad', 'FrontendController@editAd');
get('/locations/save/{lat}/{long}', 'DashboardController@saveLocation');
get('/freelancer/get/{st}/{cat}', 'FrontendController@getFreelancersByState');
get('/single-category/{category}', 'FrontendController@viewCategory');
get('/all-ad/{id}', 'FrontendController@viewAllAd');
post('/send/message', 'FrontendController@sendMessage');
get('/view/messages', 'FrontendController@viewMessage');
get('/message/delete/{id}', 'FrontendController@deleteMessage');
post('/message/reply', 'FrontendController@replyMessage');
post('/new/ad', 'FrontendController@newFreelancerAd');
get('/ad/delete/{id}', 'FrontendController@deleteAd');
post('auth/freelance/ad', 'AuthController@postFreelanceAd');
post('auth/pass/prof', 'PasswordController@changeProf');
get('/Lga/get/{id}', 'FrontendController@GetLga')->name('lga');
get('/single/ad/{id}', 'FrontendController@getSingleAd')->name('ad');
get('/single/freelance/{id}', 'FrontendController@getSingleFreelance')->name('freelancer-single');
get('/user/Edit-Ad/{id}', 'FrontendController@getAd');
get('get-started/register/', 'FrontendController@getStarted')->name('start');
get('get-started/register/buyer', 'FrontendController@getBuyer')->name('ad');
get('get-started/register/freelance', 'FrontendController@getFreelance')->name('ads');
post('subscribe-newsletter', 'FrontendController@Subscribe');
post('contact-us', 'FrontendController@suggestion');

get('frequently-ask-question', 'FrontendController@faq');
get('terms-of-use', 'FrontendController@terms');
get('how-it-works', 'FrontendController@hiw');
get('privacy-policy', 'FrontendController@privacy');
get('about', 'FrontendController@about');
get('contact-us', 'FrontendController@contact');
//search query method

get('dropzoneFile','FrontendController@dropzoneFile') ;
post('dropzoneUploadFile',array('as'=>'dropzone.uploadfile','uses'=>'FrontendController@dropzoneUploadFile')) ;

get('search/results', 'FrontendController@searchNews');
/**
 * These frontend controllers require the user to be logged in
 */
$router->group(['middleware' => 'auth'], function ()
{
	get('admin', 'DashboardController@admin');
	get('dashboard', 'DashboardController@index')->name('frontend.dashboard');
	get('profile/edit', 'ProfileController@edit')->name('frontend.profile.edit');
	patch('profile/update', 'ProfileController@update')->name('frontend.profile.update');

	//	Custom Route for Application
	
	get('user/advert', 'FrontendController@AuthUserAdvert');
    get('single/advert/{id}', 'FrontendController@singleAdvert');
	get('profile/user', 'DashBoardController@myPageFreeLance');
    post('auth/pass/prof', 'PasswordController@changeProf');
	get('new-advert', 'FrontendController@addAdvert')->name('advert');
	post('new-advert', 'FrontendController@SaveAddAdvert')->name('save.advert');

});