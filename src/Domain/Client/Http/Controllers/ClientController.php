<?php

namespace Src\Domain\Client\Http\Controllers;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Src\Domain\Client\Http\Requests\Client\ClientStoreFormRequest;
use Src\Domain\Client\Http\Requests\Client\ClientUpdateFormRequest;
use Src\Domain\Client\Repositories\Contracts\ClientRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use theaddresstech\DDD\Traits\Responder;
use Src\Domain\Client\Entities\Client;
use Src\Domain\Client\Http\Resources\Client\ClientResourceCollection;
use Src\Domain\Client\Http\Resources\Client\ClientResource;

class ClientController extends Controller
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
    protected $viewPath = 'client';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'clients';

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
    public function index(Request $request)
    {
        $index = $this->clientRepository->spatie()->paginate();

        $this->setData('title', __('main.show-all') . ' ' . __('main.client'));

        $this->setData('alias', $this->domainAlias);

        $this->setData('data', $index);

        $this->useCollection(ClientResourceCollection::class,'data');

        return $this->response();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setData('title', __('main.add') . ' ' . __('main.client'), 'web');

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
    public function store(ClientStoreFormRequest $request)
    {
        $store = $this->clientRepository->create($request->validated());
    //     $store->fill([
    //         'password' => Hash::make($store->password)
    //    ])->save();
        if($store){
            $this->setData('data', $store);

            $this->redirectRoute("{$this->resourceRoute}.show",[$store->id]);
            $this->useCollection(ClientResource::class, 'data');
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
    public function show(Client $client)
    {
        $this->setData('title', __('main.show') . ' ' . __('main.client') . ' : ' . $client->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('show', $client);

        $this->useCollection(ClientResource::class,'show');

        return $this->response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $this->setData('title', __('main.edit') . ' ' . __('main.client') . ' : ' . $client->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('edit', $client);

        $this->useCollection(ClientResource::class,'edit');

        return $this->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientUpdateFormRequest $request, $client)
    {
        $update = $this->clientRepository->update($request->validated(), $client);

        if($update){
            $this->redirectRoute("{$this->resourceRoute}.show",[$update->id]);
            $this->setData('data', $update);
            $this->useCollection(ClientResource::class, 'data');
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

        $delete = $this->clientRepository->destroy($ids);

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
