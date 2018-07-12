<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LinksInsertRequest extends Request
{
    /**
     * links 表单验证开关.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 验证规则.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'lname' => 'required|unique:jc_links',  //公司名称不为空 公司名称已经存在
        'lurl' => 'required|unique:jc_links',  //
        'lsay' => 'required',
        ];
    }


    /**
     * 返回的错误信息。
     *
     * @return array
     */
    public function messages()
    {
        return [
        'lname.required' => '名称未填写',
        'lurl.required' => '公司网站为填写',
        'lurl.unique' => '路径已经存在',
        'lname.unique' => '公司名称已经存在',
        'lsay.required' => '描述不能为空',
        ];
    }
}
