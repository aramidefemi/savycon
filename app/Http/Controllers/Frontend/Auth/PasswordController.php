<?php namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\Password;
use Illuminate\Contracts\Auth\PasswordBroker;
use App\Repositories\Frontend\User\UserContract;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Requests\Frontend\Access\ChangePasswordRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Models\Access\User\Freelancer;
use App\Models\Access\User\Buyer;


/**
 * Class PasswordController
 * @package App\Http\Controllers\Auth
 */
class PasswordController extends Controller {

	use ResetsPasswords;

	/**
	 * @var string
	 */
	protected $redirectPath = "/dashboard";

	/**
	 * @param Guard $auth
	 * @param PasswordBroker $passwords
	 * @param UserContract $user
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords, UserContract $user) {
		$this->auth = $auth;
		$this->passwords = $passwords;
		$this->user = $user;
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getEmail()
	{
		return view('frontend.auth.password');
	}

	/**
	 * @param Request $request
	 * @return $this|\Illuminate\Http\RedirectResponse
	 * @throws GeneralException
     */
	public function postEmail(Request $request)
	{
		//Make sure user is confirmed before resetting password.
		$user = User::where('email', $request->get('email'))->first();
		if ($user) {
			if ($user->confirmed == 0) {
				throw new GeneralException("Your account is not confirmed. Please click the confirmation link in your e-mail, or " . '<a href="' . route('account.confirm.resend', $user->id) . '">click here</a>' . " to resend the confirmation e-mail.");
			}
		} else {
			throw new GeneralException("There is no user with that e-mail address.");
		}

		$this->validate($request, ['email' => 'required|email']);

		$response = Password::sendResetLink($request->only('email'), function (Message $message) {
			$message->subject($this->getEmailSubject());
		});

		switch ($response) {
			case Password::RESET_LINK_SENT:
				return redirect()->back()->with('status', trans($response));

			case Password::INVALID_USER:
				return redirect()->back()->withErrors(['email' => trans($response)]);
		}
	}

	/**
	 * @param null $token
	 * @return mixed
     */
	public function getReset($token = null)
	{
		if (is_null($token))
			throw new NotFoundHttpException;
		return view('frontend.auth.reset')->withToken($token);
		
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getChangePassword() {
	    $id = auth()->user()->id;
	    $name = auth()->user()->name;
	    $email = auth()->user()->email;
	    $phone = auth()->user()->phone;
	    
	     $conn = mysqli_connect('localhost', 'savyconc_oluwest', '*%1213#olu', 'savyconc_oluwest');
		$qu = "SELECT * FROM freelancers WHERE user_id='$id'";
		$run = mysqli_query($conn, $qu);
		$dat = mysqli_fetch_assoc($run);
		
		
		$dat2 = [
		    'Phone',
		    'Electronics',
		    'Pet and Animal',
		    'Android',
		    'Artisan',
		    'auto mechanic'
		    ];
	    //print_r($dat2);
	    $description = $dat['description'];
	    $url = $dat['url'];
	    $tag = $dat['tag'];
	    $title = $dat['title'];
	    $price = $dat['price'];
	    $freelancer_category = $dat['category'];
	    
	    $qu3 = "SELECT category FROM buyers WHERE user_id='$id'";
		$run3 = mysqli_query($conn, $qu3);
		$dat3 = mysqli_fetch_assoc($run3);
		$buyer_category = $dat3['category'];
	    $price_type = $dat['price_type'];
	    
	    
	    if(auth()->user()->user_type == 'buyer')
	    {
            $category = $buyer_category;
	    }
	    else
	    {
	        $category = $freelancer_category;    
	    }
        return view('frontend.auth.change-password', compact('id', 'name', 'email', 'phone', 'url', 'title', 'tag', 'price', 'description', 'category', 'price_type','dat2'));
	    
	
	}

	/**
	 * @param ChangePasswordRequest $request
	 * @return mixed
	 */
	public function postChangePassword(ChangePasswordRequest $request) {
		$this->user->changePassword($request->all());
		return redirect()->route('frontend.dashboard')->withFlashSuccess(trans("strings.password_successfully_changed"));
	}

    public function changeProf(Request $request)
    {   
        
        $id = $request->input('id');
        $user_type = auth()->user()->user_type;
        $obj = User::where('id', $id)->first();
        $obj->name = $request->input('old_name');
        $obj->email = $request->input('old_email');
        $obj->phone = $request->input('phone');
        $first_save = $obj->save();
        
        
        // if($user_type == 'freelance')
        // {   
        //     $object = Freelancer::where('user_id', $id)->first();
        //     $object->category = $request->input('old_category');
        //     $object->price_type = $request->input('old_price_type');
        //     $object->description = $request->input('description');
        //     $request->url = $request->input('old_url');
        //     $object->title = $request->input('old_title');
        //     $object->price = $request->input('old_price');
        //     $object->tag = $request->input('old_tag');
            
        //     $second_save = $object->save();
           
            
            
        // }
        // else
        // {
        //     $object2 = Buyer::where('user_id', $id)->first();
        //     $object2->category = $request->input('old_category');
        //     $third_save = $object2->save();
            
        // }
        
        if($first_save)
        {
            return redirect()->route('frontend.dashboard')->withFlashSuccess(trans("Profile edited successfully"));
        }
        
    }
    
}
