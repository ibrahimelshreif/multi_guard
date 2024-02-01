<?php

namespace Src\Domain\Client\Http\Requests\Client;

use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;
use Src\Infrastructure\Http\AbstractRequests\BaseRequest as FormRequest;

class ClientStoreFormRequest extends FormRequest
{
    /**
     * Determine if the Client is authorized to make this request.
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
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:4', 'max:8'],
        ];
        return $rules;
    }
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = Hash::make($value);
    // }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => __('main.name'),
        ];
    }
    public function validated($key = null, $default = null)
    {
        $data = parent::validated();
        $data['password'] = Hash::make($data['password']);
        return $data;
    }
}
