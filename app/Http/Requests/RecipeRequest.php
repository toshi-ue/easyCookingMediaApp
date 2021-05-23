<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:40',
            'cookingtime' => 'required|integer|between:1,36000',
            'description' => 'required|string|max:255',
            'main_image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'is_comment_allowed' => 'required|boolean',
            // 'is_published' => 'required|boolean',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'レシピ名',
            'cookingtime' => '所要時間',
            'description' => '説明',
            'main_image' => '画像',
        ];
    }
}
