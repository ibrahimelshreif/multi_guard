<?php

namespace Src\Domain\Location\Http\Controllers;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Src\Domain\Location\Http\Requests\LocationVendors\LocationVendorsStoreFormRequest;
use Src\Domain\Location\Http\Requests\LocationVendors\LocationVendorsUpdateFormRequest;
use Src\Domain\Location\Repositories\Contracts\LocationVendorsRepository;
use Illuminate\Http\Request;
use theaddresstech\DDD\Traits\Responder;
use Src\Domain\Location\Entities\LocationVendors;
use Src\Domain\Location\Http\Resources\LocationVendors\LocationVendorsResourceCollection;
use Src\Domain\Location\Http\Resources\LocationVendors\LocationVendorsResource;

class LocationVendorsController extends Controller
{
    use Responder;

    /**
     * @var LocationVendorsRepository
     */
    protected $locationVendorsRepository;

    /**
     * View Path
     *
     * @var string
     */
    protected $viewPath = 'location_vendors';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'location_vendors';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'locations';


    /**
     * @param LocationVendorsRepository $locationVendorsRepository
     */
    public function __construct(LocationVendorsRepository $locationVendorsRepository)
    {
        $this->locationVendorsRepository = $locationVendorsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $index = $this->locationVendorsRepository->spatie()->paginate();

        $this->setData('title', __('main.show-all') . ' ' . __('main.location_vendors'));

        $this->setData('alias', $this->domainAlias);

        $this->setData('data', $index);

        $this->useCollection(LocationVendorsResourceCollection::class,'data');

        return $this->response();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setData('title', __('main.add') . ' ' . __('main.location_vendors'), 'web');

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
    public function store(LocationVendorsStoreFormRequest $request)
    {
        $store = $this->locationVendorsRepository->create($request->validated());

        if($store){
            $this->setData('data', $store);

            $this->redirectRoute("{$this->resourceRoute}.show",[$store->id]);
            $this->useCollection(LocationVendorsResource::class, 'data');
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
    public function show(LocationVendors $location_vendors)
    {
        $this->setData('title', __('main.show') . ' ' . __('main.location_vendors') . ' : ' . $location_vendors->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('show', $location_vendors);

        $this->useCollection(LocationVendorsResource::class,'show');

        return $this->response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LocationVendors $location_vendors)
    {
        $this->setData('title', __('main.edit') . ' ' . __('main.location_vendors') . ' : ' . $location_vendors->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('edit', $location_vendors);

        $this->useCollection(LocationVendorsResource::class,'edit');

        return $this->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationVendorsUpdateFormRequest $request, $location_vendors)
    {
        $update = $this->locationVendorsRepository->update($request->validated(), $location_vendors);

        if($update){
            $this->redirectRoute("{$this->resourceRoute}.show",[$update->id]);
            $this->setData('data', $update);
            $this->useCollection(LocationVendorsResource::class, 'data');
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

        $delete = $this->locationVendorsRepository->destroy($ids);

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
