<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\User\BannerRequest;
use App\Models\Access\User\Banner;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class BannerController extends Controller {


	public function getBannerImages()
	{
		return view('backend.banner.new-banner-images');
	}

	public function SaveBannerImages(BannerRequest $bannerRequest)
	{
		$banner = new Banner();
		$file = $bannerRequest->file('image');
		$destinationPath = base_path().'/../public_html/assets/Banner/';
//		var_dump($destinationPath);die;
		$filename = str_random(6).'_'.$file->getClientOriginalName();
		if ( $f = $file->move($destinationPath, $filename) ) {
			$banner->image = "/assets/Banner/". $filename;
			$banner->slug = uniqid();
			$banner->save();
			return redirect()->back()->withFlashSuccess("Created Successfully");
		} else {
			return 'Error! Uploading images.';
		}
	}

	public function allBannerImages()
	{
		$banners = Banner::paginate(20);
		$count = 0;
		return view('backend.banner.all-banner-images', compact('banners', 'count'));
	}


	public function DeleteCategory($id)
	{
		Category::whereSlug($id)->delete();
		return redirect()->route('backend.all-cat')->withFlashMessage('Deleted Successfully');
	}

}