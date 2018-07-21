<?php

namespace App\Http\Requests\home;

use App\Http\Requests\Request;

class ConsgineeRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
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
        return [
            'name' => 'required',
            'email' => 'required|regex:/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/',
            'phone' => 'required|regex:/^[1][3,4,5,7,8,9][0-9]{9}$/',
            'postcode' => 'required|regex:/^[\d]{6}$/',
        ];
    }

    public function messages()
    {
    return [
            'name.required' => '收货人姓名必填',
            'email.required' => '收货人邮箱必填',
            'email.regex' => '请输入正确邮箱',
            'phone.required' => '手机号必填',
            'phone.regex' => '请输入11位手机号码',
            'postcode.required' => '邮政编码必填',
            'postcode.regex' => '邮政编码必须为6位数字'
    ];
    }

}
