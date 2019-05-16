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
class AdvertController extends Controller {

	public function allAdvert()
	{

	}

	public function NewAdvert()
	{
		$states = State::get();
		$categories = Category::get();
		return view('backend.new-advert', compact("states","categories"));
	}

	public function SaveAdvert(UploadRequest $uploadRequest)
	{
		$product = new Product();
		$product->title = $uploadRequest->title;
		$product->description = $uploadRequest->description;
		$product->state = $uploadRequest->state;
		$product->lga = $uploadRequest->lga;
		$product->category_id = $uploadRequest->category;
		$product->price = $uploadRequest->price;
		$product->price_type = $uploadRequest->price_type;
		$check = $product->save();
//		$check = $product;
		if($check){
			foreach ($file = $uploadRequest->photos as $photo) {
				$filename = $photo->getClientOriginalName();
				$destination = "assets/Product/";
				$move = $photo->move($destination, $filename);
				if($move){
					ProductPhotos::create([
						'product_id' => $product->id,
						'filename' => $filename
					]);
				}

			}
			return redirect()->to('/admin/dashboard')->withFlashMessage('Advert Created Successfully ');
		}


	}

	public function EditAdvert($id)
	{

	}

	public function UpdateAdvert($id)
	{


	}

	public function deletAdvert($id)
	{

	}

}