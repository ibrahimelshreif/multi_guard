<?php

namespace Src\Domain\User\Http\Requests\Register;
use Src\Domain\User\Http\Requests\Register\RegisterStoreFormRequest;

class RegisterUpdateFormRequest extends RegisterStoreFormRequest
{
    /**
     * Determine if the register is authorized to make this request.
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
        // 'email'    => ['required','unique:registers,name,'.$this->route()->parameter('register').',id'],
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
