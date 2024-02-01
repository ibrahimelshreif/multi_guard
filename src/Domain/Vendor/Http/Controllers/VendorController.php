<?php

namespace Src\Domain\Vendor\Http\Controllers;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Src\Domain\Vendor\Http\Requests\Vendor\VendorStoreFormRequest;
use Src\Domain\Vendor\Http\Requests\Vendor\VendorUpdateFormRequest;
use Src\Domain\Vendor\Repositories\Contracts\VendorRepository;
use Illuminate\Http\Request;
use theaddresstech\DDD\Traits\Responder;
use Src\Domain\Vendor\Entities\Vendor;
use Src\Domain\Vendor\Http\Resources\Vendor\VendorResourceCollection;
use Src\Domain\Vendor\Http\Resources\Vendor\VendorResource;

class VendorController extends Controller
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
    protected $viewPath = 'vendor';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'vendors';

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
    public function index(Request $request)
    {
        $index = $this->vendorRepository->spatie()->paginate();

        $this->setData('title', __('main.show-all') . ' ' . __('main.vendor'));

        $this->setData('alias', $this->domainAlias);

        $this->setData('data', $index);

        $this->useCollection(VendorResourceCollection::class,'data');

        return $this->response();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setData('title', __('main.add') . ' ' . __('main.vendor'), 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setApiResponse(fn()=> response()->json(['create_your_own_form'=>true]));

        return $this->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorStoreFormRequest $request)
    {
        $store = $this->vendorRepository->create($request->validated());

        if($store){
            $this->setData('data', $store);
            $this->redirectRoute("{$this->resourceRoute}.show",[$store->id]);
            $this->useCollection(VendorResource::class, 'data');
        }else{
            $this->redirectBack();
            $this->setApiResponse(fn()=> response()->json(['created'=>false]));
        }

        return $this->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        $this->setData('title', __('main.show') . ' ' . __('main.vendor') . ' : ' . $vendor->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('show', $vendor);

        $this->useCollection(VendorResource::class,'show');

        return $this->response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        $this->setData('title', __('main.edit') . ' ' . __('main.vendor') . ' : ' . $vendor->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('edit', $vendor);

        $this->useCollection(VendorResource::class,'edit');

        return $this->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VendorUpdateFormRequest $request, $vendor)
    {
        $update = $this->vendorRepository->update($request->validated(), $vendor);

        if($update){
            $this->redirectRoute("{$this->resourceRoute}.show",[$update->id]);
            $this->setData('data', $update);
            $this->useCollection(VendorResource::class, 'data');
        }else{
            $this->redirectBack();
            $this->setApiResponse(fn()=>response()->json(['updated'=>false],422));
        }

        return $this->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = request()->get('ids',[$id]);

        $delete = $this->vendorRepository->destroy($ids);

        if($delete){
            $this->redirectRoute("{$this->resourceRoute}.index");
            $this->setApiResponse(fn()=>response()->json(['deleted'=>true],200));
        }else{
            $this->redirectBack();
            $this->setApiResponse(fn()=>response()->json(['updated'=>false],422));
        }

        return $this->response();
    }

}
