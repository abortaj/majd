<?php

namespace App\Http\Controllers;

use App\Events\Auth\UserActivationEmail;
use App\Interfaces\CityInterface;
use App\Interfaces\UserInterface;
use App\Traits\Auth;
use App\Traits\IssueToken;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Passport\TokenRepository;
use League\OAuth2\Server\ResourceServer;
//use Mail;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api
 */
class AuthController extends Controller
{

    use IssueToken, Auth;

    /**
     * @return Response
     */
    public $user;
//    public function __construct(UserInterface $user)
//    {
//        $this->user = $user;
//    }

    public function loginForm()
    {
        initSEO(trans('seo.login'));
        if(auth()->check()){
            $redirectTo=session()->get("RETURN_URL",route("home"));
            session()->forget("RETURN_URL");
            return redirect($redirectTo);
        }
        if(parse_url(\URL::previous(route("home")),PHP_URL_HOST)==$_SERVER['SERVER_NAME'])
            session()->put("RETURN_URL",\URL::previous(route("home")));
        return view('auth.login');
    }

    /**
     * @return Response
     */
    public function registerForm()
    {
        initSEO(trans('seo.register'));
        if(auth()->check()){
            $redirectTo=session()->get("RETURN_URL",route("home"));
            session()->forget("RETURN_URL");
            return redirect($redirectTo);
        }
//        $location = getLocationInfo();
//        $cityModel = $city->findByName($location['city']);
//        $data['city_id'] = $cityModel->id;
        if(parse_url(\URL::previous(route("home")),PHP_URL_HOST)==$_SERVER['SERVER_NAME'])
            session()->put("RETURN_URL",\URL::previous(route("home")));
        return view('auth.register', compact('location'));
//        return $location;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);
        $response =  $this->passwordGrant($request->email, $request->password);
        if(array_key_exists('access_token',$response)){
            $user = $this->userByToken($request, $response['access_token']);
            auth()->login($user, true);
//            $response['user']['first_name'] = $user->first_name;
//            $response['user']['type'] = $this->role($user);
            $response['message'] = trans('response.success');
            return response()->json($response);
        }
        return response()->json($response);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $this->validateRegister($request);
        $user = $this->create($request->all());
        //$user->roles()->attach(3);
        $this->sendEmail($user);
//        event(new UserActivationEmail($request->all()));
        return response()->json([
            'message' => trans('response.success'),
            'redirect' => route('registration-thanks')
        ]);
    }
    public function sendEmail($user)
    {
        Mail::to($user->email)->send(new VerifyEmail($user));
    }

    public function verify($email,$verifyToken, UserInterface $user)
    {
        $this->user = $user;
        $this->user->verifyUser($email,$verifyToken);
        return redirect(route('home'));
    }
    /**
     * @return Response
     */
    public function thanks()
    {
        initSEO(trans('seo.thanks'));
        return view('auth.registration-thanks');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'verify_token'=>str_random(40),
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request)
    {

        $this->logoutUser($request);
        return redirect(route('home'));
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin($request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Validate the user register request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateRegister($request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:60',
            'last_name' => 'required|string|max:60',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * @param User $user
     * @return string
     */
    private function role($user)
    {
        $role = 'user';
        if($user->hasRole('admin')){
            $role = 'admin';
        }else if($user->hasRole('author')){
            $role = 'author';
        }
        return $role;
    }



}