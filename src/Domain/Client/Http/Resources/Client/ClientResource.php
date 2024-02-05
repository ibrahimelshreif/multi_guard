<?php

namespace Src\Domain\Client\Http\Resources\Client;

use Illuminate\Http\Request;
use Src\Infrastructure\Http\AbstractResources\BaseResource as JsonResource;

class ClientResource extends JsonResource
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
        ];
    }
}
