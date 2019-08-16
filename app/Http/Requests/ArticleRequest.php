<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        $id = $this->article;
        return [
            'title' => 'required|max:255',
            'content' => 'required|min:50',
            'file' => 'image|mimes:jpeg,png|min:10|max:1000'
        ];
    }
    public function message()
    {
        return [
            'title.required' => 'Title is required, at least fill a character',
        ];
    }
}
