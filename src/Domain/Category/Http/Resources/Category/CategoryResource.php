<?php

namespace Src\Domain\Category\Http\Resources\Category;

use Illuminate\Http\Request;
use Src\Domain\Vendor\Http\Resources\Vendor\VendorResource;
use Src\Infrastructure\Http\AbstractResources\BaseResource as JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function data(Request $request):array
    {
        return [
            'id'               => $this->id,
            'name'             => $this->name,
        ];
    }
}
