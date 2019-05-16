<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\User\CategoryRequest;
use App\Http\Requests\Backend\Access\User\FeaturedAdRequest;
use App\Http\Requests\Backend\Access\User\UpdateFeaturedAdRequest;
use App\Models\Access\User\Buyer;
use App\Models\Access\User\Category;
use App\Http\Requests\Frontend\User\UploadRequest;
use App\Models\Access\User\FeaturedAd;
use App\Models\Access\User\Freelancer;
use App\Models\Access\User\Product;
use App\Models\Access\User\ProductPhotos;
use App\Models\Access\User\State;
use App\Models\Access\User\Local;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class DashboardController extends Controller {

	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$freelancerCount = Freelancer::get();
		$buyerCount = Freelancer::get();
		$latestFreelance = Freelancer::get()->last();
		
		$latestBuyer = Product::get()->last();
		
		return view('backend.dashboard', compact('freelancerCount','buyerCount','latestBuyer', 'latestFreelance'));
	}
	public function shareFreelancersAd()
	{   
	    $freelancers = Freelancer::paginate(10);
	    return view('backend.share_freelancers_ad', compact('freelancers'));
	}
	public function shareBuyersAd()
	{   
	    $buyers = Product::paginate(10);
	    return view('backend.share_buyers_ad',  compact('buyers'));
	}

}