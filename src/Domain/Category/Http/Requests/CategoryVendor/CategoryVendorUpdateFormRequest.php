<?php

namespace Src\Domain\Category\Http\Requests\CategoryVendor;
use Src\Domain\Category\Http\Requests\CategoryVendor\CategoryVendorStoreFormRequest;

class CategoryVendorUpdateFormRequest extends CategoryVendorStoreFormRequest
{
    /**
     * Determine if the categoryvendor is authorized to make this request.
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
        // 'email'    => ['required','unique:categoryvendors,name,'.$this->route()->parameter('categoryvendor').',id'],
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
