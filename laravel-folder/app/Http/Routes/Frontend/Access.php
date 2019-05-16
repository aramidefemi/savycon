<?php

/**
 * Frontend Access Controllers
 */
Route::post('auth/password/profile', 'PasswordController@changeProfile');

$router->group(['namespace' => 'Auth'], function () use ($router)
{
	/**
	 * These routes require the user to be logged in
	 */
	$router->group(['middleware' => 'auth'], function ()
	{
		get('auth/logout', 'AuthController@getLogout');
		get('auth/password/change', 'PasswordController@getChangePassword');
		post('auth/password/change', 'PasswordController@getChangePassword');
		post('auth/pass/prof', 'PasswordController@changeProf');
		post('auth/password/change', 'PasswordController@postChangePassword')->name('password.change');
		//new route added
		post('auth/prof/change', 'PasswordController@changeProf')->name('profile.change');
		post('auth/freelance/ad', 'AuthController@postFreelanceAd')->name('ad.create');
		post('auth/password/profile', 'PasswordController@changeProfile');
		
	
	});

	/**
	 * These reoutes require the user NOT be logged in
	 */
	$router->group(['middleware' => 'guest'], function () use ($router)
	{
		get('auth/login/{provider}', 'AuthController@loginThirdParty')->name('auth.provider');
		get('account/confirm/{token}', 'AuthController@confirmAccount')->name('account.confirm');
		get('account/confirm/resend/{user_id}', 'AuthController@resendConfirmationEmail')->name('account.confirm.resend');

		get('auth/register{check?}', 'AuthController@getRegister');
		post('auth/register{check?}', 'AuthController@postRegister');
		post('auth/freelance/ad', 'AuthController@postFreelanceAd');
		post('auth/freelance/ad', 'AuthController@postFreelanceAd')->name('ad.create');
		$router->controller('auth', 'AuthController');
		$router->controller('password', 'PasswordController');
	});
});