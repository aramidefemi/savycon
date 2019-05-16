<?php

get('dashboard', 'DashboardController@index')->name('backend.dashboard');
get('share', function () {
    return 'hello';
});
get('new/featured/ad', 'FeaturedAdController@getFeaturedAd')->name('backend.dashboard.ad');
post('new/featured/ad', 'FeaturedAdController@PostFeaturedAd')->name('backend.dashboard.ad-sav');

post('auth/pass/prof', 'PasswordController@changeProf');



get('all/featured-ad', 'FeaturedAdController@allFeaturedAd');

get('edit/featured-ad/{id}', 'FeaturedAdController@EditFeaturedAd');
get('delete/featured-ad/{id}', 'FeaturedAdController@DeleteFeaturedAd');

get('all/category', 'CategoryController@allCategory')->name('backend.all-cat');
get('new/category', 'CategoryController@getCategory')->name('backend.cat');
post('new/category', 'CategoryController@SaveCategory')->name('backend.cat-sav');

get('edit/category/{slug}', 'CategoryController@EditCategory')->name('backend.cat-edit');
post('edit/category/{slug}', 'CategoryController@UpdateCategory')->name('backend.cat-update');

get('delete/category/{slug}', 'CategoryController@DeleteCategory')->name('backend.cat-sav');


get('all/state', 'StateController@AllState')->name('backend.all-state');
get('new/state', 'StateController@getState')->name('backend.get-state');
post('new/state', 'StateController@SaveState')->name('backend.post-state');
get('edit/state/{id}', 'StateController@EditState')->name('backend.get-state');
get('edit/state/{id}', 'StateController@UpdateState')->name('backend.get-state');
get('delete/state/{id}', 'StateController@DeleteState')->name('backend.get-state');

get('new-sub-state', 'DashboardController@getSubState')->name('backend.get-substate');
get('new-sub-state', 'DashboardController@getSubState')->name('backend.get-substate');
post('new-sub-state', 'DashboardController@SaveSubState')->name('backend.post-substate');

get('new-advert', 'DashboardController@NewAdvert');
post('new-advert', 'DashboardController@SaveAdvert');

get('new/state', 'StateController@getState');
post('new/state', 'StateController@PostState');
post('edit/state/{id}', 'StateController@EditState');
get('delete/state/{id}', 'StateController@DeleteState');


get('all/sub/state', 'SubStateController@allSubState');
get('new/sub/state', 'SubStateController@getSubState');
post('new/sub/state', 'SubStateController@SaveSubState');
get('edit/sub/state/{id}', 'SubStateController@EditSubState');
post('edit/sub/state/{id}', 'SubStateController@UpdateSubState');
get('delete/sub/state/{id}', 'SubStateController@DeleteSubState');


//banner for the site

get('all/banner/images', 'BannerController@allBannerImages');
get('new/banner', 'BannerController@getBannerImages');
post('new/banner', 'BannerController@SaveBannerImages');
get('delete/banner', 'BannerController@getBannerImages');


//subscriber and suggestion
get('view/subscriber', 'SubscribeSuggestController@viewSubscriber');
get('view/suggestion', 'SubscribeSuggestController@viewSuggestion');
get('single/suggestion/{id}', 'SubscribeSuggestController@viewSuggestionSingle');


//view  Deleted Ad
get('all/delete/ad', 'DeleteAdController@ViewDeleteAd');
get('delete/ad', 'DeleteAdController@getDeleteAd');
post('delete/ad', 'DeleteAdController@saveDeleteAd');

get('view/deleted-ad', 'DeleteAdController@viewSubscriber');

//unfound search result
get('un-found-search', 'DeleteAdController@unFoundSearch');
get('freelancer/share', 'DashboardController@shareFreelancersAd');
get('buyer/share', 'DashboardController@shareBuyersAd');
