<?php

namespace App\Http\Requests\home;

use App\Http\Requests\Request;

class UsersRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //设置自动验证
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //定义验证规则
        return [
            'phone' => 'required|regex:/^1[234567890]\d{9}$/',
        ];
    }

    /**
     * 获取已定义验证规则的错误消息。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'phone.required' => '手机号必填',
            'phone.regex' => '手机号格式不正确',
        ];
    }
}
