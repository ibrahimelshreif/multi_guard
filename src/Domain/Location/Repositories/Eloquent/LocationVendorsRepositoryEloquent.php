<?php

namespace Src\Domain\Location\Repositories\Eloquent;

use Src\Domain\Location\Repositories\Contracts\LocationVendorsRepository;
use Src\Domain\Location\Entities\LocationVendors;
use Src\Infrastructure\AbstractRepositories\EloquentRepository;

/**
 * Class LocationVendorsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LocationVendorsRepositoryEloquent extends EloquentRepository implements LocationVendorsRepository
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
        return LocationVendors::class;
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
