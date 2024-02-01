<?php

namespace Src\Domain\Client\Entities;

use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Client\Entities\Traits\Relations\ClientRelations;
use Src\Domain\Client\Entities\Traits\CustomAttributes\ClientAttributes;
use Src\Domain\Client\Repositories\Contracts\ClientRepository;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Client extends Authenticatable
{
    use ClientRelations, ClientAttributes,Notifiable,HasApiTokens;

    /**
     * @var array
     */
    public static $logAttributes = ["*"];

    /**
     * The attributes that are going to be logged.
     *
     * @var array
     */
    protected static $logName = 'Client';

    protected $guarded  = ['client'];


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
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'activation_token'
    ];

    /**
     * The table name.
     *
     * @var array
     */
    protected $table = "clients";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = ClientRepository::class;
}
