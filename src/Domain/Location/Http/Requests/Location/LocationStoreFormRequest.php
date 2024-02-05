<?php

namespace Src\Domain\Location\Http\Requests\Location;

use Src\Infrastructure\Http\AbstractRequests\BaseRequest as FormRequest;

class LocationStoreFormRequest extends FormRequest
{
    /**
     * Determine if the Location is authorized to make this request.
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
            'name'        => ['required', 'string', 'max:255'],
        ];
        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'        =>  __('main.name'),
        ];
    }
}
