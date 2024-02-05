<?php

namespace Src\Domain\Vendor\Entities\Traits\Relations;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\MorphedByMany;
use Src\Domain\Category\Entities\Category;
use Src\Domain\Location\Entities\Location;

trait VendorRelations
{
        public function categories()
{
    return $this->belongsToMany(Category::class, 'category_vendors');
}
public function locations()
{
    return $this->belongsToMany(Location::class, 'location_vendors');
}

}
