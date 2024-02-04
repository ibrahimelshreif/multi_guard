<?php

namespace Src\Domain\Location\Http\Requests\LocationVendors;
use Src\Domain\Location\Http\Requests\LocationVendors\LocationVendorsStoreFormRequest;

class LocationVendorsUpdateFormRequest extends LocationVendorsStoreFormRequest
{
    /**
     * Determine if the locationvendors is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
        // 'email'    => ['required','unique:locationvendors,name,'.$this->route()->parameter('locationvendors').',id'],
        ];

        return array_merge(parent::rules(), $rules);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return parent::attributes();
    }
}
