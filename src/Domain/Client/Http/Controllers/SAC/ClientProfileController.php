<?php

namespace Src\Domain\Client\Http\Controllers\SAC;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Src\Domain\Client\Repositories\Contracts\ClientRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use theaddresstech\DDD\Traits\Responder;
use Src\Domain\Client\Http\Resources\Client\ClientResourceCollection;
use Src\Domain\Client\Http\Resources\Client\ClientResource;

class ClientProfileController extends Controller
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
    protected $viewPath = 'client-profile';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'client-profiles';

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
    public function show(Request $request)
    {
        $clientid = auth()->guard('client-api')->id();
        $index = $this->clientRepository->find($clientid);
        if ($index) {
            $this->setData('data', $index);

            $this->useCollection(ClientResource::class, 'data');

            return $this->response();
        } else {
            return 'false';
        }
    }
}
