<?php

namespace Src\Domain\Location\Entities;

use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Location\Entities\Traits\Relations\LocationclientsRelations;
use Src\Domain\Location\Entities\Traits\CustomAttributes\LocationclientsAttributes;
use Src\Domain\Location\Repositories\Contracts\LocationclientsRepository;

class Locationclients extends Model
{
    use LocationclientsRelations, LocationclientsAttributes;

    /**
     * @var array
     */
    public static $logAttributes = ["*"];

    /**
     * The attributes that are going to be logged.
     *
     * @var array
     */
    protected static $logName = 'Locationclients';

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
    protected $table = "locationclients";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = LocationclientsRepository::class;
}
