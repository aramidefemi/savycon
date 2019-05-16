<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\User\BannerRequest;
use App\Models\Access\User\Banner;
use App\Models\Access\User\Subscribe;
use App\Models\Access\User\Suggestion;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class SubscribeSuggestController extends Controller {
	public function viewSuggestion()
	{
		$suggestions = Suggestion::paginate(10);
		$count = 0;
		return view('backend.suggestion.suggestion', compact('suggestions', 'count'));
	}
	public function viewSuggestionSingle($id)
	{
		$suggestion = Suggestion::whereId($id)->first();
		return view('backend.suggestion.single-suggestion', compact('suggestion'));
	}

	public function viewSubscriber()
	{
		$subscribers = Subscribe::paginate(10);
		$count = 0;
		return view('backend.subscribe', compact('subscribers', 'count'));

	}

}