<?php

namespace Src\Domain\Category\Entities;

use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Category\Entities\Traits\Relations\CategoryVendorRelations;
use Src\Domain\Category\Entities\Traits\CustomAttributes\CategoryVendorAttributes;
use Src\Domain\Category\Repositories\Contracts\CategoryVendorRepository;

class CategoryVendor extends Model
{
    use CategoryVendorRelations, CategoryVendorAttributes;

    /**
     * @var array
     */
    public static $logAttributes = ["*"];

    /**
     * The attributes that are going to be logged.
     *
     * @var array
     */
    protected static $logName = 'CategoryVendor';

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
        'name','category_id','vendor_id'
    ];

    /**
     * The table name.
     *
     * @var array
     */
    protected $table = "category_vendors";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = CategoryVendorRepository::class;
}
