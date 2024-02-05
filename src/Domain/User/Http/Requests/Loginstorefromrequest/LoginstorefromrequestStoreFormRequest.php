<?php

namespace Src\Domain\User\Http\Requests\Loginstorefromrequest;

use Src\Infrastructure\Http\AbstractRequests\BaseRequest as FormRequest;

class LoginstorefromrequestStoreFormRequest extends FormRequest
{
    /**
     * Determine if the Loginstorefromrequest is authorized to make this request.
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
            'email'       =>['required','string','email'],
            'password'    =>['required','string','min:4','max:8'],        ];
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
