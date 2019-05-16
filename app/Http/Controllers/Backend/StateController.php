<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\User\CategoryRequest;
use App\Http\Requests\Backend\Access\User\FeaturedAdRequest;
use App\Http\Requests\Backend\Access\User\StateRequest;
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
class StateController extends Controller {
	public function allState()
	{
// 		$states = State::orderBy('name', 'ASC')->paginate(10);
        $states = State::get();
		$count = 0;
		return view('backend.state.all-state', compact('states', 'count'));

	}
	public function getState()
	{
		return view('backend.state.new-state');
	}

	public function PostState(StateRequest $request)
	{
		$state = new State();
		$state->name = $request->name;
		$state->save();
		return redirect()->back()->withFlashMessage('Created Successfully');
	}

	public function EditState($id)
	{
		$state = State::whereId($id)->get()->first();
		return view('backend.state.edit-state', compact('state'));
	}

	public function UpdateState($id, StateRequest $request)
	{
		$updateState = State::find($id)->first();
		return $updateState->name = $request->name;
		$updateState->update();
		return redirect()->route('backend.all-state')->withFlashMessage('Updated Successfully');
	}

	public function DeleteState($id)
	{
		State::find($id)->delete();
		return redirect()->route('backend.all-state')->withFlashMessage('Deleted Successfully');
	}

}