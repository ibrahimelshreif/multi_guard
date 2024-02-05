<?php

namespace Src\Domain\Vendor\Http\Controllers\SAC;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Src\Domain\Vendor\Repositories\Contracts\VendorRepository;
use Illuminate\Http\Request;
use theaddresstech\DDD\Traits\Responder;
use Src\Domain\Vendor\Http\Resources\Vendor\VendorResourceCollection;
use Src\Domain\Vendor\Http\Resources\Vendor\VendorResource;

class VendorprofileController extends Controller
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
    protected $viewPath = 'vendorprofile';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'vendorprofiles';

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
    public function show(Request $request)
    {
        $vendorid = auth()->guard('vendor-api')->id();
        $index = $this->vendorRepository->find($vendorid);
        if ($index) {
            $this->setData('data', $index);

            $this->useCollection(VendorResource::class, 'data');

            return $this->response();
        } else {
            return 'false';
        }
    }
}
