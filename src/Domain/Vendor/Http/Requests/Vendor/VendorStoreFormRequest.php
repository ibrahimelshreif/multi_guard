<?php

namespace Src\Domain\Vendor\Http\Requests\Vendor;

use Illuminate\Support\Facades\Hash;
use Src\Infrastructure\Http\AbstractRequests\BaseRequest as FormRequest;

class VendorStoreFormRequest extends FormRequest
{
    /**
     * Determine if the Vendor is authorized to make this request.
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
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:4', 'max:8'],
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
    public function validated($key = null, $default = null)
    {
        $data = parent::validated();
        $data['password'] = Hash::make($data['password']);
        return $data;
    }
}
