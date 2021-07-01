<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventPhotoRequest extends FormRequest
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
            'photos.*' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'image' => 'Um ou mais arquivos de imagem são inválidos!'
        ];
    }
}
