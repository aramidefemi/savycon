<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\User\CategoryRequest;
use App\Http\Requests\Backend\Access\User\FeaturedAdRequest;
use App\Http\Requests\Backend\Access\User\SubStateRequest;
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
class SubStateController extends Controller {

	public function allSubState()
	{
		$subStates = Local::get();
		$count = 0;
		return view('backend.state.sub-state.all-sub-state', compact('subStates', 'count'));
	}
	public function getSubState()
	{
		$states = State::get();
		return view('backend.state.sub-state.new-sub-state', compact('states'));
	}

	public function SaveSubState(SubStateRequest $request)
	{
		$subState  = new Local();
		$subState->state_name = $request->state;
		$subState->sub_state_name = $request->sub_state_name;
		$subState->save();
		return redirect()->back()->withFlashMessage('Created Successfully');
	}

	public function EditSubState($id)
	{
		$subState = Local::whereId($id)->first();
		$states = State::get();
		return view('backend.state.sub-state.edit-sub-state', compact('states', 'subState'));
	}

	public function UpdateSubState($id, SubStateRequest $request)
	{
		$subState = Local::whereId($id)->first();
		$subState->state_name = $request->state;
		$subState->sub_state_name = $request->sub_state_name;
		$subState->update();
		return redirect()->back()->withFlashMessage('Updated Successfully');
	}

    public function DeleteSubState($id)
	{
		$subState = Local::whereId($id)->first();
		$subState->delete();
		return redirect()->back()->withFlashMessage('Deleted Successfully');
	}
}