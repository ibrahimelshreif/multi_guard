<?php

namespace Src\Domain\Vendor\Repositories\Eloquent;

use Src\Domain\Vendor\Repositories\Contracts\VendorRepository;
use Src\Domain\Vendor\Entities\Vendor;
use Src\Infrastructure\AbstractRepositories\EloquentRepository;

/**
 * Class VendorRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class VendorRepositoryEloquent extends EloquentRepository implements VendorRepository
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
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Vendor::class;
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
