<?php

namespace Src\Domain\Client\Http\Controllers\SAC;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Src\Domain\Client\Repositories\Contracts\ClientRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Src\Domain\Client\Http\Requests\Client\ClientStoreFormRequest;
use theaddresstech\DDD\Traits\Responder;
use Src\Domain\Client\Http\Resources\Client\ClientResourceCollection;
use Src\Domain\Client\Http\Resources\Client\ClientResource;

class LoginController extends Controller
{
    use Responder;

    /**
     * @var ClientRepository
     */
    protected $clientRepository;

    /**
     * View Path
     *
     * @var string
     */
    protected $viewPath = 'login';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'logins';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'clients';


    /**
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(ClientStoreFormRequest $request)
    {
        $clientinfo = $request->only(['email','password']);
        if (!auth()->guard('client')->attempt($clientinfo)) {
            $this->setApiResponse(fn()=>response()->json(['false' => 'Please Register And Try Again !!']));
        
        }else{   
            $catchclient = auth('client')->user();
            $this->setData('data',$catchclient);
            $this->useCollection(ClientResource::class,'data');
            // dd($catchclient);
            $this->setData('token',['token'=>$catchclient->createToken('client Token',['client'])->accessToken]);
        }
        return $this->response();
    }
    
        // $index = $this->clientRepository->spatie()->paginate();
        // $this->setData('title', __('main.show-all') . ' ' . __('main.login'));

        // $this->setData('alias', $this->domainAlias);

        // $this->setData('data', $index);

        // $this->useCollection(ClientResourceCollection::class,'data');

        // return $this->response();
    }
