<?php namespace App\Http\Controllers\Frontend\Auth;

use App\Models\Access\User\Buyer;
use App\Models\Access\User\Category;
use App\Models\Access\User\FreelancePhotos;
use App\Models\Access\User\Freelancer;
use App\Models\Access\User\Product;
use App\Models\Access\User\State;
use Illuminate\Http\Request;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Requests\Frontend\Access\LoginRequest;
use App\Http\Requests\Frontend\Access\RegisterRequest;
use App\Repositories\Frontend\Auth\AuthenticationContract;

/**
 * Class AuthController
 * @package App\Http\Controllers\Frontend\Auth
 */
class AuthController extends Controller
{

    use ThrottlesLogins;

    /**
     * @param AuthenticationContract $auth
     */
    public function __construct(AuthenticationContract $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getRegister($check)
    {
        $checker = $check;
        $states = State::orderBy('name', 'ASC')->get();
        $categories = Category::get();
        return view('frontend.auth.register', compact('states', 'categories','checker'));
    }

    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
     
    

    public function postRegister(Request $request)
    {   if($request->user_type == 'freelance')
        {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6',
            'title' => 'required',
            'category' => 'required',
            'price' => 'required',
            'price_type' => 'required',
            'description' => 'required',
            'tag' => 'required',
            'state' => 'required',
            'lga' => 'required',
         
        
        ]);
        }
        
        if($request->user_type == 'buyer')
        {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'phone' => 'required',
                'password' => 'required|min:6',
                'state' => 'required',
                'lga' => 'required',
                'address' => 'required'
                
            ]);
        }
        $the_name = $request->input('name');
        $the_email = $request->input('email');
        $the_password = $request->input('password');
        
        $the_message = 'Welcome '.$the_name.' to Savycon, your email is ('.$the_email.') and password is ('.$the_password.')';
        $header = "From: admin@savycon.com<savyconc@server06.thcservers.som>";
        //mail($the_email, "Registeration Complete", $the_message, $header);
        //dd($request);
        //$newUser = $request->only('name', 'user_type', 'state', 'lga', 'phone', 'email', 'password');
        if (config('access.users.confirm_email')) {
            $this->auth->create($request->all());
            if($request->user_type == 'freelance'){
                $freelancer = new Freelancer();
                $freelancer->title = $request->title;
                $freelancer->user_id = auth()->user()->id;
                $freelancer->category = $request->category;
                $freelancer->price = $request->price;
                $freelancer->price_type = $request->price_type;
                $freelancer->description = $request->description;
                $freelancer->tag = $request->tag;
                $freelancer->address = $request->address;
                $freelancer->url = $request->url;
                $freelancer->state = $request->state;
                $freelancer->lga = $request->lga;
                $freelancer->save();
                
                $freelancer_img = FreelancePhotos::where('user_id','=',0)->get();
                foreach ($freelancer_img as $img){
                    $img = FreelancePhotos::find($img->id);
                    $img->user_id = $freelancer->id;
                    $img->save();
                }
                
                // foreach ($file = $request->photos as $photo){
                //     $filename = $photo->getClientOriginalName();
                //     $destination = "assets/Freelancer/";
                //     $move = $photo->move($destination, $filename);
                //     if($move){
                //         FreelancePhotos::create([
                //             'freelance_id' => $freelancer->id,
                //             'filename' => "assets/Freelancer/".$filename
                //         ]);
                //     }
                // }
                return redirect()->route('home')->withFlashSuccess("Your account was successfully created. We have sent you an e-mail to confirm your account.");
            }elseif($request->user_type == 'buyer'){
                $buyer =   new Buyer();
                $buyer->user_id = auth()->user()->id;

                $buyer->category = $request->category;
                $buyer->save();
                return redirect()->route('home')->withFlashSuccess("Your account was successfully created. We have sent you an e-mail to confirm your account.");
            }

        } else {
            //Use native auth login because do not need to check status when registering
            auth()->login($this->auth->create($request->all()));
            if($request->user_type == 'freelance'){
                $freelancer = new Freelancer();
                $freelancer->title = $request->title;
                $freelancer->user_id = auth()->user()->id;
                $freelancer->category = $request->category;
                $freelancer->price = $request->price;
                $freelancer->price_type = $request->price_type;
                $freelancer->description = $request->description;
                $freelancer->tag = $request->tag;
                $freelancer->address = $request->address;
                $freelancer->url = $request->url;
                $freelancer->state = $request->state;
                $freelancer->lga = $request->lga;
                $name = [];
                
                $freelancer_img = FreelancePhotos::where('user_id','=',0)->get();
                $img = array();
                foreach ($freelancer_img as $fre_img){
                    $imgs = FreelancePhotos::find($fre_img->id);
                    $img[] = $imgs->filename;
                }
                
                // foreach ($file = $request->photos as $photo) {
                //     $filename = $photo->getClientOriginalName();
                //     $path = public_path('assets/Freelancer');
                //     if (!file_exists($path)) {
                //         mkdir($path);
                //     }
                //     $move = $photo->move($path, $filename);
                //     if($move){
                //         $name[] = "assets/Freelancer/".$filename;
                //     }
                // }
                
                $imageSave =  implode(',', $img);
                $freelancer->img_url = $imageSave;
                $freelancer->save();
                
                foreach ($freelancer_img as $fre_img) {
                    $fr_img = FreelancePhotos::find($fre_img->id);
                    $fr_img->user_id = $freelancer->id;
                    $fr_img->save();
                }

                return redirect()->route('frontend.dashboard');
            }
            elseif($request->user_type == 'buyer') {
                $buyer =   new Buyer();
                $buyer->user_id = auth()->user()->id;
                $buyer->category = $request->category;
                $buyer->save();
                
                // $product = new Product();
                // $product->user_address = $request->address;
                // $product->category_name = $request->category;
                // $product->state = $request->state;
                // $product->lga = $request->lga;
                // $product->save();

                return redirect()->route('frontend.dashboard');

            }
        }
        

    }

    /**
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {
        return view('frontend.auth.login')
            ->withSocialiteLinks($this->getSocialLinks());
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(LoginRequest $request)
    {
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request))
            return $this->sendLockoutResponse($request);

        //Don't know why the exception handler is not catching this
        try {
            $this->auth->login($request);

            if ($throttles)
                $this->clearLoginAttempts($request);

            return redirect()->intended('/dashboard');
        } catch (GeneralException $e) {
            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            if ($throttles)
                $this->incrementLoginAttempts($request);

            return redirect()->back()->withInput()->withFlashDanger($e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param $provider
     * @return mixed
     */
    public function loginThirdParty(Request $request, $provider)
    {
        return $this->auth->loginThirdParty($request->all(), $provider);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout()
    {
        $this->auth->logout();
        return redirect()->route('home');
    }

    /**
     * @param $token
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function confirmAccount($token)
    {
        //Don't know why the exception handler is not catching this
        try {
            $this->auth->confirmAccount($token);
            return redirect()->route('frontend.dashboard')->withFlashSuccess("Your account has been successfully confirmed!");
        } catch (GeneralException $e) {
            return redirect()->back()->withInput()->withFlashDanger($e->getMessage());
        }
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function resendConfirmationEmail($user_id)
    {
        //Don't know why the exception handler is not catching this
        try {
            $this->auth->resendConfirmationEmail($user_id);
            return redirect()->route('home')->withFlashSuccess("A new confirmation e-mail has been sent to the address on file.");
        } catch (GeneralException $e) {
            return redirect()->back()->withInput()->withFlashDanger($e->getMessage());
        }
    }

    /**
     * Helper methods to get laravel's ThrottleLogin class to work with this package
     */

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function loginUsername()
    {
        return property_exists($this, 'username') ? $this->username : 'email';
    }

    /**
     * Determine if the class is using the ThrottlesLogins trait.
     *
     * @return bool
     */
    protected function isUsingThrottlesLoginsTrait()
    {
        return in_array(
            ThrottlesLogins::class, class_uses_recursive(get_class($this))
        );
    }

    /**
     * Generates social login links based on what is enabled
     * @return string
     */
    protected function getSocialLinks()
    {
        $socialite_enable = [];
        $socialite_links = '';

        if (getenv('GITHUB_CLIENT_ID') != '')
            $socialite_enable[] = link_to_route('auth.provider', trans('labels.login_with', ['social_media' => 'Github']), 'github');

        if (getenv('FACEBOOK_CLIENT_ID') != '')
            $socialite_enable[] = link_to_route('auth.provider', trans('labels.login_with', ['social_media' => 'Facebook']), 'facebook');

        if (getenv('TWITTER_CLIENT_ID') != '')
            $socialite_enable[] = link_to_route('auth.provider', trans('labels.login_with', ['social_media' => 'Twitter']), 'twitter');

        if (getenv('GOOGLE_CLIENT_ID') != '')
            $socialite_enable[] = link_to_route('auth.provider', trans('labels.login_with', ['social_media' => 'Google']), 'google');

        for ($i = 0; $i < count($socialite_enable); $i++) {
            $socialite_links .= ($socialite_links != '' ? '&nbsp;|&nbsp;' : '') . $socialite_enable[$i];
        }

        return $socialite_links;
    }
}
