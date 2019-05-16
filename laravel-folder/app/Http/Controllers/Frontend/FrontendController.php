<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\SearchRequest;
use App\Http\Requests\Frontend\User\SubscribeRequest;
use App\Http\Requests\Frontend\User\SuggestionRequest;
use App\Http\Requests\Frontend\User\UploadRequest;
//use App\Http\Requests\Request;
use Illuminate\Http\Request;
use App\Models\Access\User\Banner;
use App\Models\Access\User\Buyer;
use App\Models\Access\User\Message;
use App\Models\Access\User\R;
use App\Models\Access\User\Category;
use App\Models\Access\User\FeaturedAd;
use App\Models\Access\User\Freelancer;
use App\Models\Access\User\Ip;
use App\Models\Access\User\Product;
use App\Models\Access\User\ProductPhotos;
use App\Models\Access\User\Record;
use App\Models\Access\User\Search;
use App\Models\Access\User\State;
use App\Models\Access\User\Local;
use App\Models\Access\User\Subscribe;
use App\Models\Access\User\Suggestion;
use App\Models\Access\User\User;
use Illuminate\Http\Response;
use App\Models\Access\User\FreelancePhotos;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller {

    public function dropzoneFile(){
        return view('dropzone_file_upload');
    }
    public function dropzoneUploadFile(Request $request){
        $data = \Input::all();
        if($data['type']=="freelance"){
            $destinationPath = "assets/Freelancer/";
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath);
            }
            $img_name = $request->file->getClientOriginalName();
            $imageName = $img_name;
            $filename = "assets/Freelancer/".$imageName;
            $request->file->move($destinationPath, $filename);
            FreelancePhotos::create([
                'user_id' => 0,
                'filename' => $filename
            ]);
            return response()->json(['success'=>$imageName]);
        }else{
            $destinationPath = public_path('assets/Product/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath);
            }
            $img_name = $request->file->getClientOriginalName();
            $imageName = time().'.'.$img_name;
            $filename = "assets/Product/".$imageName;
            $request->file->move($destinationPath, $imageName);
            ProductPhotos::create([
                'product_id' => 0,
				'filename' => $filename
            ]);
            return response()->json(['success'=>$imageName]);
        }
    }
    
	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{   
		//dd(auth()->user());
		
	    $adverts = Product::orderByRaw("RAND()")->simplePaginate(25);
		$freelancers  = Freelancer::orderByRaw("RAND()")->simplePaginate(25);
		$featuredAd = FeaturedAd::orderBy('id','DESC')->get();
		$banner = Banner::get()->last();
		$categories = State::get();
		$the_cat = Category::get();
		$recents = Freelancer::orderByRaw("RAND()")->simplePaginate(5);
	
		return view('frontend.index', compact('adverts', 'freelancers', 'featuredAd', 'banner', 'categories', 'the_cat', 'recents'));
	}
	
	public function single_advert($advert_id) {
	    
	    
	    
	    $product = Product::find($advert_id);
		return view('noAuthAdvert', compact('product'));
	    
	}
    
    public function viewCategory($category) 
    {   
       
        $freelancers = Freelancer::select('*')->where('category', $category)->get();
        $states = State::get();
        return view('single-category', compact('freelancers', 'category', 'states'));
    }
    
    public function viewAllAd($id)
    {   
        $user_id = auth()->user()->id;
        if(auth()->user()->user_type == 'freelance')
        {
            $freelancers = Freelancer::select('*')->where('user_id', $user_id)->get();
            return view('all-ad', compact('freelancers'));
        }
        else
        {
            $freelancers = Product::select('*')->where('user_id', $user_id)->get();
            return view('all-ad', compact('freelancers'));
        }
    }
    
    public function sendMessage(Request $request)
    {    
        $message = $request->message;
        $user_id = $request->user_id;
        $object = new Message();
        $object->message = $message;
        $object->user_id = $user_id;
        $object->email = $request->email;
        $object->phone =  $request->phone;
        
        if($request->user_type == 'buyer')
        {
            $object->p_id = $request->product_id;
        }
        if($object->save())
        {
            return redirect()->to('/')->withFlashMessage('Message sent');
        }
        
       
    }
    
    
    
    public function replyMessage(Request $request)
    {   
       
        $object = Message::find($request->message_id);
        $object->status = 'Replied to';
        $object->save();
        
        if(auth()->user()->user_type == 'freelance')
        {
            $current_user_id = auth()->user()->id;
            $get_message_id = Freelancer::select('id')->where('user_id', $current_user_id)->get();
    		
    		
    		$f_id = $get_message_id[0]->id;
        }
        else{
           
            $f_id = $request->product_id;
        }
        $obj = new R();
        $obj->reply = $request->reply;
        $obj->m_id = $request->message_id;
        
        $obj->user_id = $f_id;
        
        
        if($obj->save())
        {
            return redirect()->to('/dashboard')->withFlashMessage('Reply sent');
        }
    }
    
    public function viewMessage()
    {   
        $current_user_id = auth()->user()->id;
        if(auth()->user()->user_type == 'freelance')
        {
             $get_freelancer_id = Freelancer::select('id')->where('user_id', $current_user_id)->get();
		  $id = $get_freelancer_id[0]->id;
        }
        else{
            $id = auth()->user()->id;
        }
        
        $all_messages = Message::select('*')->where('user_id', $id)->get();
          
        return view('messages', compact('all_messages'));
      
    }
    
    public function deleteMessage($id)
    {
        $obj = Message::find($id);
        if($obj->delete())
        {
        
            return redirect()->to('/dashboard')->withFlashMessage('Message deleted');
            
        }
    }
    
	public function searchNews(SearchRequest $request)
	{  
	   // echo $request->q;
	   // echo $request->category;
	   // die();
		$search = $request->q;
		$featuredAd = FeaturedAd::orderBy('id','DESC')->where('to_show', 'home')->paginate(2);
		$categories = State::get();
		$searchCategory = $request->category;
		if($search && strlen($search) > 1)
		{   

		    $advert = Freelancer::select('*')->where("category", $search)->get();
		    
			$adverts = Freelancer::where("category", 'like', '%' . $search . '%')->whereState($searchCategory)->paginate(100000);
			
			if(count($adverts) < 1) {
				$adverts = $adverts = Freelancer::where("description", 'like', '%' . $search . '%')->whereState($searchCategory)->paginate(100000);
			}

			if(count($advert) < 1) {

				$saveQuery = new Search();
				$saveQuery->email = auth()->user() ? auth()->user()->email : 'Guest';
				$saveQuery->name =auth()->user() ? auth()->user()->name : 'Guest';
				$saveQuery->keyword = $search;
				$saveQuery->save();
			}
			return view("frontend.search-result", compact('adverts','featuredAd','categories', 'search'));
		}
		else {
			$adverts = collect([]);
			return view("frontend.search-result", compact('adverts','featuredAd','categories', 'search'));
		}
	}

	public function addAdvert(){
		//get user type
		$id = auth()->user()->id;
		$categories = Category::get();
		$states = State::orderBy('name', 'ASC')->get();
        
		if(auth()->user()->user_type == 'freelance'){
			$category = Freelancer::whereUserId($id)->first()->category;
		}elseif(auth()->user()->user_type == 'buyer'){
			$category = Buyer::whereUserId($id)->first()->category;
		}else{
			$category  = '';
		}
		return view('frontend.advert.new-advert', compact('category', 'categories', 'states'));
	}

	public function GetLga($id)
	{
		$lgas = Local::orderBy('sub_state_name','ASC')->whereState_name($id)->get();
		return $lgas->toJson();
	}
    
    public function getFreelancersByState($st, $cat)
    {   
        $match = ['state' => $st, 'category' => $cat];
        $freelancers = Freelancer::where($match)->get();
        return $freelancers->toJson();
    }
    
    public function SaveAddAdvert(UploadRequest $uploadRequest)
	{   
	    
	   // dd($uploadRequest->file("file"));
	    
		$id = auth()->user()->id;
		if(auth()->user()->user_type == 'freelance'){
			$category = Freelancer::whereUserId($id)->first()->category;
		}elseif(auth()->user()->user_type == 'buyer'){
			$category = User::find(auth()->user()->id)->buyer->category;
		}else{
			$category = 'Super';
		}

		$product = new Product();
		$product->user_id = auth()->user()->id;
		$product->state = $uploadRequest->state;
		$product->lga = $uploadRequest->lga;
		$product->category_name =$category;
        $product->address = $uploadRequest->address;
		$product->title = $uploadRequest->title;
		$product->description = $uploadRequest->description;
		$product->price = $uploadRequest->price;
		$product->no_of_workers = $uploadRequest->no_of_worker;
		$product->no_of_gadget = $uploadRequest->no_of_gadget;
		$product->tag = $uploadRequest->tag;
		
		
// 		return $product;
		$check = $product->save();
		

		if($check){
		  //  $product_img = ProductPhotos::where('product_id','=',0)->get();
    //         foreach ($product_img as $img){
    //             $img = ProductPhotos::find($img->id);
    //             $img->user_id = $product->id;
    //             $img->save();
    //         }
    		if(!empty($uploadRequest->file)) {
	    			foreach ($file = $uploadRequest->file as $photo) {
					$filename = $photo->getClientOriginalName();
					$destination = "assets/Product/";
					$move = $photo->move($destination, $filename);
					if($move) {
						ProductPhotos::create([
							'product_id' => $product->id,
							'filename' => $filename
						]);
					}
				}
    		}
    		else {
    			ProductPhotos::create([
							'product_id' => $product->id,
							'filename' => $uploadRequest->default_image
						]);
    		}
			



			if($uploadRequest->ajax()){
				$uploadRequest->session()->flash('status', 'Advert Created Successfully');
				return response()->json([
					'success' => 1,
				]);
			}
			return redirect()->to('/dashboard')->withFlashMessage('Advert Created Successfully ');
		}

	}


	public function AuthUserAdvert()
	{   
	    $user_id = auth()->user()->id;
	    $featuredAd = FeaturedAd::orderBy('id','DESC')->where('to_show', 'home')->paginate(2);
	    if(auth()->user()->user_type == 'buyer')
	    {
		
		$adverts = Product::whereUserId($user_id)->orderBy("id", 'DESC')->paginate(9);
		return view('frontend.advert.user-advert', compact('adverts', 'featuredAd'));
		
	    }
	    else
	    {
	        
		$adverts = Freelancer::whereUserId($user_id)->orderBy("id", 'DESC')->paginate(9);
		return view('frontend.advert.user-advert', compact('adverts', 'featuredAd'));
	    }
	    
	}
	
	public function singleAdvert($id)
	{   
	    if(auth()->user()->user_type == 'buyer')
	    {
	       $product = Product::find($id);
		}
	    if(auth()->user()->user_type == 'freelance')
	    {
	       $product = Freelancer::find($id);
	    }
	    
	    $messages = Message::select('*')->where('p_id', $id)->get();
		$all_replies = R::select('*')->where('user_id', $id)->get();;
	    $product = Product::find($id);
		return view('frontend.advert.single-advert', compact('product', 'messages', 'all_replies'));
	}

	public function getSingleFreelance($id)
	{
		$freelance =  Freelancer::find($id);
	    $the_user_ip = $_SERVER['REMOTE_ADDR'];
		
		$conn = mysqli_connect('localhost', 'savyconc_oluwest', '*%1213#olu', 'savyconc_oluwest');
		$qu = "SELECT * FROM ips WHERE prop_id='$id' AND ip='$the_user_ip'";
		$run = mysqli_query($conn, $qu);
		$dat = mysqli_fetch_assoc($run);
		if(count($dat) < 1 ) {
		$query = "INSERT into ips(user_id, ip, prop_id) VALUES('$freelance->user_id', '$the_user_ip', '$id')";
		mysqli_query($conn, $query);
		}
		$images = explode(',',$freelance->img_url);
		$messages = Message::select('*')->where('user_id', $id)->get();
		$all_replies = R::select('*')->where('user_id', $id)->get();
		
		
		$qu5 = "SELECT * FROM locations WHERE freelance_id='$id'";
		
		$run5 = mysqli_query($conn, $qu5);
		$dat5 = mysqli_fetch_assoc($run5);
		$lat = $dat5['latitude'];
		$long = $dat5['longitude'];
		return view('frontend.freelance.single-freelance', compact('freelance', 'images', 'messages', 'all_replies', 'lat', 'long'));
	}
	
	
	
	public function getAd($id)
	{   
	    $categories = Category::get();
	     if(auth()->user()->user_type == 'buyer')
	 	{
	 	  	$adverts = Product::find($id);
    	     return view('editAd', compact('adverts', 'categories'));
	    }
	    if(auth()->user()->user_type == 'freelance')
	    {
	        $adverts = Freelancer::find($id);
	        $states = State::get();
	        $user_id = $adverts->user_id;
	        $user_info = User::where('id', $user_id)->first();
	        return view('editAd', compact('adverts', 'categories', 'states',  'user_info'));
	    }
	
	}
	
	public function editAd(uploadRequest $uploadRequest)
	{   
	    IF(auth()->user()->user_type == 'buyer')
	    {
	    $user_id= $uploadRequest->user_id;
	    $id = $uploadRequest->adId;
	    $product = Product::find($id);
	    
        $product->title = $uploadRequest->title;
        $product->category_name = $uploadRequest->category_name;
		$product->description = $uploadRequest->description;
		$product->price = $uploadRequest->price;
		$product->no_of_workers = $uploadRequest->no_of_worker;
		$product->no_of_gadget = $uploadRequest->no_of_gadget;
		$product->tag = $uploadRequest->tag;
		$product->address = $uploadRequest->address;
		
            
		$check = $product->save();

		if($check){
                if(!empty($uploadRequest->file))
                {
			foreach ($file = $uploadRequest->file as $photo) {
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
			if($uploadRequest->ajax()){
				$uploadRequest->session()->flash('status', 'Advert Edited Successfully');
				return response()->json([
					'success' => 1,
				]);
			}
			
			
		}
	
		}
		
	}
	else
	{
	   
	    $user_id = $uploadRequest->uId;
	    $id = $uploadRequest->aId;
	 
	    
	    $user = User::find($user_id);
	    $user->email = $uploadRequest->email;
	    $user->name = $uploadRequest->name;
	    $user->phone = $uploadRequest->phone;
	    $user->save();
	    
	    $product = Freelancer::find($id);
	    $product->title = $uploadRequest->title;
        $product->category = $uploadRequest->category;
		$product->description = $uploadRequest->description;
		$product->price = $uploadRequest->price;
		$product->state = $uploadRequest->state;
		$product->lga = $uploadRequest->lga;
		$product->tag = $uploadRequest->tag;
	    $check = $product->save();
		
		if($check){
                if(!empty($uploadRequest->file))
                {
			foreach ($file = $uploadRequest->file as $photo) {
				$filename = $photo->getClientOriginalName();
				$destination = "assets/Freelancer/";
				$move = $photo->move($destination, $filename);
				if($move){
					ProductPhotos::create([
						'product_id' => $product->id,
						'filename' => $filename
					]);
				}
			}
			if($uploadRequest->ajax()){
				$uploadRequest->session()->flash('status', 'Advert Edited Successfully');
				return response()->json([
					'success' => 1,
				]);
			}
			
			
		}
	
		}
	}
	return redirect()->to('/user/advert')->withFlashMessage('Advert Edited Successfully ');
	}
    
    public function deleteAd($id)
    {   
        if(auth()->user()->user_type == 'buyer')
        {
            $obj = Product::find($id);
            $obj->delete();
        }
        if(auth()->user()->user_type == 'freelance')
        {
            $obj = Freelancer::find($id);
            $obj->delete(); 
        }
        return redirect()->to('/user/advert')->withFlashMessage('Advert Deleted Successfully ');
    }
    
    public function newFreelancerAd(uploadRequest $uploadRequest)
    {   
        
        $image = $uploadRequest->file[0]->getClientOriginalName();
        
     
        $freelancer = new Freelancer();
        $freelancer->title = $uploadRequest->title;
        $freelancer->user_id = auth()->user()->id;
        $freelancer->category = $uploadRequest->category;
        $freelancer->price = $uploadRequest->price;
        $freelancer->price_type = $uploadRequest->price_type;
        $freelancer->description = $uploadRequest->description;
        $freelancer->tag = $uploadRequest->tag;
        $freelancer->phone = $uploadRequest->phone;
        $freelancer->url = $uploadRequest->url;
        $freelancer->state = $uploadRequest->state;
        $freelancer->address = $uploadRequest->address;
        $freelancer->lga = $uploadRequest->lga;
        $freelancer->img_url = 'assets/Freelancer/'.$image;
        if($freelancer->save())
        {       
            
            foreach ($file = $uploadRequest->file as $photo) {
                
				$filename = $photo->getClientOriginalName();
				
				$destination = "assets/Freelancer/";
				$move = $photo->move($destination, $filename);
				if($move){
					FreelancePhotos::create([
						'user_id' => $freelancer->id,
						'filename' => $filename
					]);
				}
			}
			if($uploadRequest->ajax()){
				$uploadRequest->session()->flash('status', 'Advert Edited Successfully');
				return response()->json([
					'success' => 1,
				]);
			}
            return redirect()->to('/user/advert')->withFlashMessage('Advert Created Successfully ');
        }
        
    }
     
    	
	
	public function allCategories()
	{
		$categories = Category::get();
		return view('frontend.category.all-category', compact('categories'));
	}
	public function BrowseCategory($id)
	{
		$browseProducts = Product::where('category_id', $id)->get();
		return view('frontend.category.browse-category', compact('browseProducts'));
	}

	public function getBuyer()
	{
		$states = State::get();
		$categories = Category::get();
		return view('frontend.auth.account.buyer', compact('states', 'categories'));
	}

	public function getFreelance()
	{
		$states = State::get();
		$categories = Category::get();
		return view('frontend.auth.account.freelance', compact('states', 'categories'));
	}

	public function getStarted()
	{
		return view('frontend.auth.account.start', compact('states', 'categories'));
	}
	public function Subscribe(SubscribeRequest $request)
	{
		$subscribe = new Subscribe();
		$subscribe->email = $request->email;
		$subscribe->save();
		return redirect()->back()->withFlashMessage('Thank you We will update you with Latest Update');

	}

	public function suggestion(SuggestionRequest $request)
	{
		$suggest = new Suggestion();
		$suggest->name = $request->name;
		$suggest->email = $request->email;
		$suggest->comment = $request->comment;
		$suggest->save();
		
		$message = "The mail message was sent with the following Details:\r\n Name:$request->name;\r\nEmail Addres: $request->email;\r\nComment : $request->comment;";

        $headers = "From: $request->email;";


        mail("admin@savycon.com", "New Comment Message", $message, $headers);
	    
	    	return redirect()->to('/')->withFlashMessage('Thanks for your contribution will Appreciate Your Opinion');
	}

   
    
	public function faq()
	{
		return view('frontend.faq');
	}

	public function about()
	{
		return view('frontend.about');
	}

	public function hiw()
	{
		return view('frontend.how-it-works');
	}

	public function contact()
	{
		return view('frontend.contact');
	}

	public function terms()
	{
		return view('frontend.terms');
	}

	public function privacy()
	{
		return view('frontend.privacy-policy');
	}
	
}