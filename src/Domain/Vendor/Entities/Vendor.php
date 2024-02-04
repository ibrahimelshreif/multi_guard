<?php

namespace Src\Domain\Vendor\Entities;

use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Vendor\Entities\Traits\Relations\VendorRelations;
use Src\Domain\Vendor\Entities\Traits\CustomAttributes\VendorAttributes;
use Src\Domain\Vendor\Repositories\Contracts\VendorRepository;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Vendor extends Authenticatable
{
    use VendorRelations, VendorAttributes,Notifiable,HasApiTokens;

    /**
     * @var array
     */
    public static $logAttributes = ["*"];

    /**
     * The attributes that are going to be logged.
     *
     * @var array
     */
    protected static $logName = 'Vendor';

    protected $guard = 'vendor';


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
        'name', 'email', 'password','vendor_id','category_id'
    ];

    /**
     * The table name.
     *
     * @var array
     */
    protected $table = "vendors";


    protected $hidden = [
        'password',
        'remember_token',
        'activation_token'
    ];


    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = VendorRepository::class;
}
