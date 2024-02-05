<?php

namespace Src\Domain\Location\Entities;

use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Location\Entities\Traits\Relations\LocationVendorsRelations;
use Src\Domain\Location\Entities\Traits\CustomAttributes\LocationVendorsAttributes;
use Src\Domain\Location\Repositories\Contracts\LocationVendorsRepository;

class LocationVendors extends Model
{
    use LocationVendorsRelations, LocationVendorsAttributes;

    /**
     * @var array
     */
    public static $logAttributes = ["*"];

    /**
     * The attributes that are going to be logged.
     *
     * @var array
     */
    protected static $logName = 'LocationVendors';

    /**
     * define belongsTo relations.
     *
     * @var array
     */
    private $belongsTo = [];

    /**
     * define hasMany relations.
     *
     * @var array
     */
    private $hasMany = [];

    /**
     * define belongsToMany relations.
     *
     * @var array
     */
    private $belongsToMany = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The table name.
     *
     * @var array
     */
    protected $table = "location_vendors";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = LocationVendorsRepository::class;
}
