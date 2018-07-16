<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SlidsInsertRequest extends Request
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
        'surl' => 'required|unique:jc_slids|url',  //公司名称不为空 公司名称已经存在
        'simg' => 'required|unique:jc_slids|mimes:jpeg,bmp,png,jpg',  //
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
        'surl.required' => '请填写有效路径',
        'surl.unique' => '该网站链接已经存在!',
        'simg.unique' => '图片存在失败!请重新尝试!',
        'simg.mimes' => '图片传输格式不正确(jpeg,bmp,png,jpg)',
        'surl.url' => '链接格式错误',
        ];
    }
}
