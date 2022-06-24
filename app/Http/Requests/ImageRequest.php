<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
     * Traduction des champs
     * @return array
     */
    public function attributes()
    {
        return [];
    }

    /**
     * Messages personnalisé si besoin
     * @return array
     */
    public function messages()
    {
        return [];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'string',
            'path' => 'required|string|unique:images,path,'.($this->id ?? 'NULL').',id',
            'date' => 'required|date',
            'desc' => 'required|string',
            'id_type' => 'required|integer|exists:types,id'
        ];
    }
}
