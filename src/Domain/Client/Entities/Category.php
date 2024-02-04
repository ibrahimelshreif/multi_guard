<?php

namespace Src\Domain\Client\Entities;

use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Client\Entities\Traits\Relations\CategoryRelations;
use Src\Domain\Client\Entities\Traits\CustomAttributes\CategoryAttributes;
use Src\Domain\Client\Repositories\Contracts\CategoryRepository;

class Category extends Model
{
    use CategoryRelations, CategoryAttributes;

    /**
     * @var array
     */
    public static $logAttributes = ["*"];

    /**
     * The attributes that are going to be logged.
     *
     * @var array
     */
    protected static $logName = 'Category';

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
    protected $table = "categories";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = CategoryRepository::class;
}
