<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\User\CategoryRequest;
use App\Http\Requests\Backend\Access\User\FeaturedAdRequest;
use App\Http\Requests\Backend\Access\User\UpdateFeaturedAdRequest;
use App\Models\Access\User\Category;
use App\Http\Requests\Frontend\User\UploadRequest;
use App\Models\Access\User\FeaturedAd;
use App\Models\Access\User\Product;
use App\Models\Access\User\ProductPhotos;
use App\Models\Access\User\State;
use App\Models\Access\User\Local;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class FeaturedAdController extends Controller {

	public function getFeaturedAd()
	{
		$states = State::get();
		return view('backend.ad-settings.advert-setting', compact('states'));
	}

	public function PostFeaturedAd(FeaturedAdRequest $request)
	{
		$featuredAd = new FeaturedAd();
		$featuredAd->title = $request->title;
		$featuredAd->url = $request->url;
		$featuredAd->to_show = $request->show;
		$featuredAd->description = $request->description;
//		return $featuredAd;
		$item = '';
		foreach($request->state as $state){
			$item[] = $state;
		}
		$savedState = implode(',', $item);
		$featuredAd->state = $savedState;
		foreach ($file = $request->photos as $photo) {

			$filename = $photo->getClientOriginalName();
			$destination = "assets/Featured/";
			$move = $photo->move($destination, $filename);
			if($move){
				$name[] = "assets/Featured/".$filename;
			}
		}

		$imageSave =  implode(',', $name);
		$featuredAd->img_url = $imageSave;

		$featuredAd->save();
		return redirect()->back()->withFlashMessage('Advert Created Successfully');
	}

	public function allFeaturedAd()
	{
		$count = 0;
		$featuredAds = FeaturedAd::paginate(15);
		return view('backend.ad-settings.all-advert-setting', compact('featuredAds', 'count'));
	}

	public function EditFeaturedAd($id)
	{
		$edit = FeaturedAd::whereId($id)->get()->first();
		return view('backend.ad-settings.edit-advert-setting', compact('edit'));
	}

	public function UpdateFeaturedAd($id, UpdateFeaturedAdRequest $request)
	{
		$update = FeaturedAd::whereId($id)->get()->first();
		$update->title = $request->title;
		$update->url = $request->url;
		$update->state = $request->state;
		$update ->to_show = $request->show;
		$update->description = $request->description;
		$update->update();

		return redirect()->to('all/featured-ad')->withFlashMessage('Updated Successfully');
	}
	public function DeleteFeaturedAd($id)
	{
		$delete = FeaturedAd::whereId($id)->delete();
		if($delete){
			return redirect()->back()->withFlashMessage('Advert Deleted Successfully');
		}
	}
}