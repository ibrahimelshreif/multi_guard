<?php

namespace Src\Domain\Location\Http\Resources\Locationclients;

use Illuminate\Http\Request;
use Src\Infrastructure\Http\AbstractResources\BaseResource as JsonResource;

class LocationclientsResource extends JsonResource
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
