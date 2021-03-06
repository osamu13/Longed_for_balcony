<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:25',
            'category_id' =>'required' ,
            'image' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須になります!',
            'title.max' => 'タイトル25文字以内で入力してください!',
            'category_id.required' => 'どちらか選択してください!',
            'image.required' => '画像は必須になります!',
            'content.required' => '内容は必須になります!',
        ];
    }
}
