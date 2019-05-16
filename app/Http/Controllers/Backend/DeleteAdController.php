<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\User\BannerRequest;
use App\Http\Requests\Backend\Access\User\DeleteAdRequest;
use App\Models\Access\User\Banner;
use App\Models\Access\User\Buyer;
use App\Models\Access\User\Product;
use App\Models\Access\User\Search;
use App\Models\Access\User\Subscribe;
use App\Models\Access\User\Suggestion;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class DeleteAdController extends Controller {
	public function getDeleteAd()
	{
		return view('backend.delete-ad.delete-ad');
	}

	public function saveDeleteAd(DeleteAdRequest $deleteAdRequest)
	{
		$from =  $deleteAdRequest->start_date;
		$to =  $deleteAdRequest->end_date;
		$deletedAds = Product::whereBetween('created_at', [$from, $to])->get()->pluck('id');
		$done = null;
		foreach($deletedAds as $delete){
			$done = Product::whereId($delete)->delete();
		}

		if($done){
			$count = $deletedAds->count();
			return redirect()->back()->withFlashMessage("$count Items deleted successfully");
		}else{
			$count = $deletedAds->count();
			return redirect()->back()->withFlashMessage("$count Record Found");
		}


	}

	public function ViewDeleteAd()
	{
		$deletes = Product::onlyTrashed()->get();
		$count = 0;
		return view('backend.delete-ad.all-delete-ad', compact('deletes', 'count'));
	}

	public function unFoundSearch()
	{
		$items = Search::get();
		$count = 0;
		return view('backend.search.unfound-search', compact('items', 'count'));
	}

}