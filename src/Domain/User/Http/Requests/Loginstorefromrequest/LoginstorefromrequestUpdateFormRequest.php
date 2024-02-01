<?php

namespace Src\Domain\User\Http\Requests\Loginstorefromrequest;
use Src\Domain\User\Http\Requests\Loginstorefromrequest\LoginstorefromrequestStoreFormRequest;

class LoginstorefromrequestUpdateFormRequest extends LoginstorefromrequestStoreFormRequest
{
    /**
     * Determine if the loginstorefromrequest is authorized to make this request.
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
        // 'email'    => ['required','unique:loginstorefromrequests,name,'.$this->route()->parameter('loginstorefromrequest').',id'],
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
