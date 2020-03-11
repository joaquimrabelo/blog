<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
        $title = 'required|unique:posts';
        if ($this->id) {
            $title = 'required|unique:posts,id,' . $this->id;
        }
        return [
            'title' => $title,
            'imagem' => 'required:image',
            'resumo' => 'required',
            'texto' => 'required'
        ];
    }
}
