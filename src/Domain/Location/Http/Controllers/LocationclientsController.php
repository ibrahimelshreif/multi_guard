<?php

namespace Src\Domain\Location\Http\Controllers;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Src\Domain\Location\Http\Requests\Locationclients\LocationclientsStoreFormRequest;
use Src\Domain\Location\Http\Requests\Locationclients\LocationclientsUpdateFormRequest;
use Src\Domain\Location\Repositories\Contracts\LocationclientsRepository;
use Illuminate\Http\Request;
use theaddresstech\DDD\Traits\Responder;
use Src\Domain\Location\Entities\Locationclients;
use Src\Domain\Location\Http\Resources\Locationclients\LocationclientsResourceCollection;
use Src\Domain\Location\Http\Resources\Locationclients\LocationclientsResource;

class LocationclientsController extends Controller
{
    use Responder;

    /**
     * @var LocationclientsRepository
     */
    protected $locationclientsRepository;

    /**
     * View Path
     *
     * @var string
     */
    protected $viewPath = 'locationclients';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'locationclients';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'locations';


    /**
     * @param LocationclientsRepository $locationclientsRepository
     */
    public function __construct(LocationclientsRepository $locationclientsRepository)
    {
        $this->locationclientsRepository = $locationclientsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $index = $this->locationclientsRepository->spatie()->paginate();

        $this->setData('title', __('main.show-all') . ' ' . __('main.locationclients'));

        $this->setData('alias', $this->domainAlias);

        $this->setData('data', $index);

        $this->useCollection(LocationclientsResourceCollection::class,'data');

        return $this->response();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setData('title', __('main.add') . ' ' . __('main.locationclients'), 'web');

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
    public function store(LocationclientsStoreFormRequest $request)
    {
        $store = $this->locationclientsRepository->create($request->validated());

        if($store){
            $this->setData('data', $store);

            $this->redirectRoute("{$this->resourceRoute}.show",[$store->id]);
            $this->useCollection(LocationclientsResource::class, 'data');
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
    public function show(Locationclients $locationclients)
    {
        $this->setData('title', __('main.show') . ' ' . __('main.locationclients') . ' : ' . $locationclients->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('show', $locationclients);

        $this->useCollection(LocationclientsResource::class,'show');

        return $this->response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Locationclients $locationclients)
    {
        $this->setData('title', __('main.edit') . ' ' . __('main.locationclients') . ' : ' . $locationclients->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('edit', $locationclients);

        $this->useCollection(LocationclientsResource::class,'edit');

        return $this->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationclientsUpdateFormRequest $request, $locationclients)
    {
        $update = $this->locationclientsRepository->update($request->validated(), $locationclients);

        if($update){
            $this->redirectRoute("{$this->resourceRoute}.show",[$update->id]);
            $this->setData('data', $update);
            $this->useCollection(LocationclientsResource::class, 'data');
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

        $delete = $this->locationclientsRepository->destroy($ids);

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
