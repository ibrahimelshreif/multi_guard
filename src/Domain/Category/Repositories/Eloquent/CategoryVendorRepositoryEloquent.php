<?php

namespace Src\Domain\Category\Repositories\Eloquent;

use Src\Domain\Category\Repositories\Contracts\CategoryVendorRepository;
use Src\Domain\Category\Entities\CategoryVendor;
use Src\Infrastructure\AbstractRepositories\EloquentRepository;

/**
 * Class CategoryVendorRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CategoryVendorRepositoryEloquent extends EloquentRepository implements CategoryVendorRepository
{

    /**
     * Specify Fields
     *
     * @return string
     */
    protected $allowedFields = [
        ###allowedFields###
    	###\allowedFields###
    ];

    /**
     * Include Relationships
     *
     * @return string
     */
    protected $allowedIncludes = [
        ###allowedIncludes###
    	###\allowedIncludes###
        'categories','vendors'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoryVendor::class;
    }

    /**
     * Specify Model Relationships
     *
     * @return string
     */
    public function relations()
    {
        return [
            ###allowedRelations###
            ###\allowedRelations###
        ];
    }
}
