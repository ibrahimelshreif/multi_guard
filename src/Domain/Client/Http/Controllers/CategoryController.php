<?php

namespace Src\Domain\Client\Http\Controllers;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Src\Domain\Client\Http\Requests\Category\CategoryStoreFormRequest;
use Src\Domain\Client\Http\Requests\Category\CategoryUpdateFormRequest;
use Src\Domain\Client\Repositories\Contracts\CategoryRepository;
use Illuminate\Http\Request;
use theaddresstech\DDD\Traits\Responder;
use Src\Domain\Client\Entities\Category;
use Src\Domain\Client\Http\Resources\Category\CategoryResourceCollection;
use Src\Domain\Client\Http\Resources\Category\CategoryResource;

class CategoryController extends Controller
{
    use Responder;

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * View Path
     *
     * @var string
     */
    protected $viewPath = 'category';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'categories';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'clients';


    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $index = $this->categoryRepository->spatie()->paginate();

        $this->setData('title', __('main.show-all') . ' ' . __('main.category'));

        $this->setData('alias', $this->domainAlias);

        $this->setData('data', $index);

        $this->useCollection(CategoryResourceCollection::class,'data');

        return $this->response();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setData('title', __('main.add') . ' ' . __('main.category'), 'web');

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
    public function store(CategoryStoreFormRequest $request)
    {
        $store = $this->categoryRepository->create($request->validated());

        if($store){
            $this->setData('data', $store);

            $this->redirectRoute("{$this->resourceRoute}.show",[$store->id]);
            $this->useCollection(CategoryResource::class, 'data');
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
    public function show(Category $category)
    {
        $this->setData('title', __('main.show') . ' ' . __('main.category') . ' : ' . $category->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('show', $category);

        $this->useCollection(CategoryResource::class,'show');

        return $this->response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $this->setData('title', __('main.edit') . ' ' . __('main.category') . ' : ' . $category->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('edit', $category);

        $this->useCollection(CategoryResource::class,'edit');

        return $this->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateFormRequest $request, $category)
    {
        $update = $this->categoryRepository->update($request->validated(), $category);

        if($update){
            $this->redirectRoute("{$this->resourceRoute}.show",[$update->id]);
            $this->setData('data', $update);
            $this->useCollection(CategoryResource::class, 'data');
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

        $delete = $this->categoryRepository->destroy($ids);

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
