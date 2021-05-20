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
            'cookingtime' => 'required|integer',
            'description' => 'required|string',
            // 'is_comment_allowed' => 'required|boolean',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'レシピ名',
            'cookingtime' => '所要時間',
            'description' => '所要時間',
        ];
    }
}
