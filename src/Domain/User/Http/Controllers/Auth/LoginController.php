<?php

namespace Src\Domain\User\Http\Controllers\Auth;

use Src\Domain\User\Http\Requests\Loginstorefromrequest\LoginstorefromrequestStoreFormRequest;
use Src\Domain\User\Http\Resources\User\UserResource;
use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use theaddresstech\DDD\Traits\Responder;


class LoginController extends Controller
{
    use Responder;

    /**
     * View Path.
     *
     * @var string
     */
    protected $viewPath = 'user';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'users';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'users';

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        
        return view("{$this->domainAlias}::{$this->viewPath}.auth.login", [
            'title' => __('main.login')
        ]);
        
    }

    public function login(LoginstorefromrequestStoreFormRequest $request)
    {
        $userinfo = $request->only(['email','password']);
        if (!auth()->attempt($userinfo)) {
                return $this->setApiResponse(fn()=>response()->json(['false' => 'Please Register And Try Again !!']));
        }   
        $catchuser = $request->user();
        $this->setData('data',$catchuser);
        $this->useCollection(UserResource::class,'data');
        $this->setData('token',['token'=>$catchuser->createToken('user Token',['user'])->accessToken]);
        return $this->response();
    }
    /**
     * @Override
     *
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated()
    {
        if (auth()->check()) {
            return redirect()->intended(route('dashboard'));
        }

        return redirect()->intended($this->redirectPath());
    }
}
