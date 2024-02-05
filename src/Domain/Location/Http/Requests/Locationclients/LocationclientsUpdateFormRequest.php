<?php

namespace Src\Domain\Location\Http\Requests\Locationclients;
use Src\Domain\Location\Http\Requests\Locationclients\LocationclientsStoreFormRequest;

class LocationclientsUpdateFormRequest extends LocationclientsStoreFormRequest
{
    /**
     * Determine if the locationclients is authorized to make this request.
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
        // 'email'    => ['required','unique:locationclients,name,'.$this->route()->parameter('locationclients').',id'],
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
