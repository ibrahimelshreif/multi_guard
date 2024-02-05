<?php

namespace Src\Domain\Vendor\Http\Controllers\SAC;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Src\Domain\Vendor\Repositories\Contracts\VendorRepository;
use Illuminate\Http\Request;
use Src\Domain\Vendor\Http\Requests\Vendor\VendorStoreFormRequest;
use theaddresstech\DDD\Traits\Responder;
use Src\Domain\Vendor\Http\Resources\Vendor\VendorResourceCollection;
use Src\Domain\Vendor\Http\Resources\Vendor\VendorResource;

class LoginController extends Controller
{
    use Responder;

    /**
     * @var VendorRepository
     */
    protected $vendorRepository;

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
    protected $domainAlias = 'vendors';


    /**
     * @param VendorRepository $vendorRepository
     */
    public function __construct(VendorRepository $vendorRepository)
    {
        $this->vendorRepository = $vendorRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(VendorStoreFormRequest $request)
    {
        $vendoinfo = $request->only(['email','password']);
        if (!auth()->guard('vendor')->attempt($vendoinfo)) {
            $this->setApiResponse(fn()=>response()->json(['false' => 'Please Register And Try Again !!']));
        
        }else{   
            $catchvendor = auth('vendor')->user();
            $this->setData('data',$catchvendor);
            $this->useCollection(VendorResource::class,'data');
            $this->setData('token',['token'=>$catchvendor->createToken('vendor Token',['vendor'])->accessToken]);
        }
        return $this->response();
    }
}
