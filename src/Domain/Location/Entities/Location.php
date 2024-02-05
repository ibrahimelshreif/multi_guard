<?php

namespace Src\Domain\Location\Entities;

use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Location\Entities\Traits\Relations\LocationRelations;
use Src\Domain\Location\Entities\Traits\CustomAttributes\LocationAttributes;
use Src\Domain\Location\Repositories\Contracts\LocationRepository;

class Location extends Model
{
    use LocationRelations, LocationAttributes;

    /**
     * @var array
     */
    public static $logAttributes = ["*"];

    /**
     * The attributes that are going to be logged.
     *
     * @var array
     */
    protected static $logName = 'Location';

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
        'name','vendor_id','location_id'
    ];

    /**
     * The table name.
     *
     * @var array
     */
    protected $table = "locations";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = LocationRepository::class;
}
