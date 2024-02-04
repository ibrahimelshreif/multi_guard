<?php

namespace Src\Domain\Location\Repositories\Eloquent;

use Src\Domain\Location\Repositories\Contracts\LocationclientsRepository;
use Src\Domain\Location\Entities\Locationclients;
use Src\Infrastructure\AbstractRepositories\EloquentRepository;

/**
 * Class LocationclientsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LocationclientsRepositoryEloquent extends EloquentRepository implements LocationclientsRepository
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
        return Locationclients::class;
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
