<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CatesRequest extends Request
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
            'classname' => 'required',
            'pid' => 'required',
        ];
    }

    /**
    *验证提示消息
    */
    public function messages()
    {
        return [
            'classname.required' =>'！分类名称不允许为空',
            'classname.unique'=>'!该分类已经存在',
            'pid.required' =>'！父类不允许为空',
        ];
    }
}
