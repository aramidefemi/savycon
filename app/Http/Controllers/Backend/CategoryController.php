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
class CategoryController extends Controller {

	public function getCategory()
	{
		return view('backend.category.new-category');
	}

	public function SaveCategory(CategoryRequest $categoryRequest)
	{
		$category = new Category();
		$category->name = $categoryRequest->name;
		$category->slug = uniqid();
		$category->save();
		return redirect()->back()->withFlashSuccess("$category->cat_name Category Created Successfully");
	}

	public function allCategory()
	{
		$categories = Category::paginate(9);
		$count = 0;
		return view('backend.category.all-category', compact('categories', 'count'));
	}

	public function EditCategory($slug)
	{
		$edit = Category::whereSlug($slug)->first();
		return view('backend.category.edit-category', compact('edit'));
	}

	public function UpdateCategory($id, CategoryRequest $request)
	{
		$updateCategory = Category::whereSlug($id)->first();
		$updateCategory->name = $request->name;
		$updateCategory->update();
		return redirect()->route('backend.all-cat')->withFlashMessage('Updated Successfully');
	}

	public function DeleteCategory($id)
	{
		Category::whereSlug($id)->delete();
		return redirect()->route('backend.all-cat')->withFlashMessage('Deleted Successfully');
	}
}