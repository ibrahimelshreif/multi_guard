<?php

namespace Src\Domain\Category\Entities\Traits\Relations;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\MorphedByMany;
use Src\Domain\Vendor\Entities\Vendor;

trait CategoryRelations
{
    ###allowedRelations###
    ###\allowedRelations###
    public function vendors()
{
    return $this->belongsToMany(Vendor::class, 'category_vendors');
}

}
