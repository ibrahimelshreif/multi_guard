<?php

namespace Src\Domain\Vendor\Http\Resources\Vendor;

use Illuminate\Http\Request;
use Src\Domain\Category\Http\Resources\Category\CategoryResource;
use Src\Infrastructure\Http\AbstractResources\BaseResource as JsonResource;

class VendorResource extends JsonResource
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
            'email'            => $this->email,
            'categories'       => CategoryResource::collection($this->whenLoaded('categories1')),
        ];
    }
}
