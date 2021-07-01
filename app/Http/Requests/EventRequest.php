<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title'       => 'required|min:30',
            'description' => 'required',
            'body'        => 'required',
            'start_event' => 'required',
            'banner'      => 'image'
        ];
    }

    public function messages()
    {
        return  [
            'title.required' => 'Este campo título é obrigatório',
            'required'       => 'Este campo é obrigatório',
            'min'            => 'Este campo não atinge o mínimo de caracteres permitidos. Tamanho mínimo permitido :min',
            'image'          => 'Arquivo de imagem inválido!'
        ];
    }
}
