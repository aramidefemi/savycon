<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Access\User\FeaturedAd;
use App\Models\Access\User\Freelancer;
use App\Models\Access\User\Product;
use App\Models\Access\User\User;
use App\Models\Access\User\Buyer;
use App\Models\Access\User\Message;
use App\Models\Access\User\Location;


/**
 * Class DashboardController
 * @package App\Http\Controllers\Frontend
 */
class DashboardController extends Controller {

	/**
	 * @return mixed
	 */
	public function index()
	{
		$details = null;
		$id = auth()->user()->id;
		$conn = mysqli_connect('localhost', 'savyconc_oluwest', '*%1213#olu', 'savyconc_oluwest');
		$featuredAd = FeaturedAd::orderBy('id', 'DESC')->where('to_show', 'home')->paginate(2);
		if(auth()->user()->user_type == 'freelance'){
		    $current_user_id = auth()->user()->id;
		$get_message_id = Freelancer::select('id')->where('user_id', $current_user_id)->get();
		
		
		$auth_id = $get_message_id[0]->id;
		$qu10 = "SELECT * FROM messages WHERE user_id='$auth_id'";
		$run10 = mysqli_query($conn, $qu10);
		$number = $run10->num_rows;
		    $category = Freelancer::whereUserId($id)->first();
		    if(count($category)<1){
		        return redirect()->route('home');
		    }
			//get all buyer with the same category
			$details = Product::where('category_name', $category->category)
			->where('state', $category->state)
			->paginate(9);
		}elseif(auth()->user()->user_type == 'buyer'){
		    
		    $auth_id = auth()->user()->id;
    		$qu10 = "SELECT * FROM messages WHERE user_id='$auth_id'";
    		$run10 = mysqli_query($conn, $qu10);
    		$number = $run10->num_rows;
		    
		    $category = Buyer::where('user_id', $id)->first();
		    //get all freelance with the same category
			$details = Product::where('category_name', $category->category_name)->paginate(9);

		}else{

			$details = null;
		}
        
        
		
		
	
		
		$qu = "SELECT * FROM ips WHERE user_id='$id'";
		$run = mysqli_query($conn, $qu);
		$dat = mysqli_fetch_array($run);
        
		$viewed = $run->num_rows;
		
		return view('frontend.user.dashboard', compact('details', 'featuredAd','viewed', 'number'))->withUser(auth()->user());
	}
    
	public function myPageFreeLance()
	{
		$id =  auth()->user()->id;
		$detail =  Freelancer::whereUserId($id)->first();
		$images = explode(',', $detail->img_url);
		$data = [
			'details' => $detail,
			'images' => $images
		];
		return view('frontend.user.mypage', compact('data'))->withUser(auth()->user());

	}
	public function admin(){
	
	    $freelancerCount = Freelancer::get();
		$buyerCount = Freelancer::get();
		$latestFreelance = Freelancer::get()->last();
		$latestBuyer = Product::get()->last();
		return view('backend.dashboard', compact('freelancerCount','buyerCount','latestBuyer', 'latestFreelance'));
	}
	
	
	public function saveLocation($lat, $long)
	{   
	    if(Auth()->user()->user_type == 'freelance')
	    {   
	        $f_id = Freelancer::select('id')->where('user_id', auth()->user()->id)->get();
	        $id = $f_id[0]->id;
	        $conn = mysqli_connect('localhost', 'savyconc_oluwest', '*%1213#olu', 'savyconc_oluwest');
	        
	        $qu = "SELECT * FROM locations WHERE freelance_id='$id'";
    		$run = mysqli_query($conn, $qu);
    		$dat = mysqli_fetch_assoc($run);
    		if(count($dat) < 1)
    		{
    		    $query = "INSERT into locations(latitude, longitude, freelance_id) VALUES('$lat', '$long', '$id')";
		
	        if(mysqli_query($conn, $query))
	        {
	            echo "Location saved";
	        }
    		}
	        
	    }
	}
}
