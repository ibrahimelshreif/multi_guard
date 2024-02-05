<?php

namespace Src\Domain\Category\Http\Controllers;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Src\Domain\Category\Http\Requests\CategoryVendor\CategoryVendorStoreFormRequest;
use Src\Domain\Category\Http\Requests\CategoryVendor\CategoryVendorUpdateFormRequest;
use Src\Domain\Category\Repositories\Contracts\CategoryVendorRepository;
use Illuminate\Http\Request;
use theaddresstech\DDD\Traits\Responder;
use Src\Domain\Category\Entities\CategoryVendor;
use Src\Domain\Category\Http\Resources\CategoryVendor\CategoryVendorResourceCollection;
use Src\Domain\Category\Http\Resources\CategoryVendor\CategoryVendorResource;

class CategoryVendorController extends Controller
{
    use Responder;

    /**
     * @var CategoryVendorRepository
     */
    protected $categoryVendorRepository;

    /**
     * View Path
     *
     * @var string
     */
    protected $viewPath = 'category_vendor';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'category_vendors';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'categories';


    /**
     * @param CategoryVendorRepository $categoryVendorRepository
     */
    public function __construct(CategoryVendorRepository $categoryVendorRepository)
    {
        $this->categoryVendorRepository = $categoryVendorRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $index = $this->categoryVendorRepository->spatie()->paginate();

        $this->setData('title', __('main.show-all') . ' ' . __('main.category_vendor'));

        $this->setData('alias', $this->domainAlias);

        $this->setData('data', $index);

        $this->useCollection(CategoryVendorResourceCollection::class,'data');

        return $this->response();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setData('title', __('main.add') . ' ' . __('main.category_vendor'), 'web');

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
    public function store(CategoryVendorStoreFormRequest $request)
    {
        $store = $this->categoryVendorRepository->create($request->validated());

        if($store){
            $this->setData('data', $store);

            $this->redirectRoute("{$this->resourceRoute}.show",[$store->id]);
            $this->useCollection(CategoryVendorResource::class, 'data');
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
    public function show(CategoryVendor $category_vendor)
    {
        $this->setData('title', __('main.show') . ' ' . __('main.category_vendor') . ' : ' . $category_vendor->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('show', $category_vendor);

        $this->useCollection(CategoryVendorResource::class,'show');

        return $this->response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryVendor $category_vendor)
    {
        $this->setData('title', __('main.edit') . ' ' . __('main.category_vendor') . ' : ' . $category_vendor->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('edit', $category_vendor);

        $this->useCollection(CategoryVendorResource::class,'edit');

        return $this->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryVendorUpdateFormRequest $request, $category_vendor)
    {
        $update = $this->categoryVendorRepository->update($request->validated(), $category_vendor);

        if($update){
            $this->redirectRoute("{$this->resourceRoute}.show",[$update->id]);
            $this->setData('data', $update);
            $this->useCollection(CategoryVendorResource::class, 'data');
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

        $delete = $this->categoryVendorRepository->destroy($ids);

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
