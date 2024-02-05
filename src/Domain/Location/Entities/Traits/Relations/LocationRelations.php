<?php

namespace Src\Domain\Location\Entities\Traits\Relations;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\MorphedByMany;
use Src\Domain\Client\Entities\Client;
use Src\Domain\Vendor\Entities\Vendor;

trait LocationRelations
{
    ###allowedRelations###
    ###\allowedRelations###
    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'location_vendors');
    }
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'locationclients');
    }
}
