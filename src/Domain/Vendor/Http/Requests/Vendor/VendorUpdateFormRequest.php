<?php

namespace Src\Domain\Vendor\Http\Requests\Vendor;
use Src\Domain\Vendor\Http\Requests\Vendor\VendorStoreFormRequest;

class VendorUpdateFormRequest extends VendorStoreFormRequest
{
    /**
     * Determine if the vendor is authorized to make this request.
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
        // 'email'    => ['required','unique:vendors,name,'.$this->route()->parameter('vendor').',id'],
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
