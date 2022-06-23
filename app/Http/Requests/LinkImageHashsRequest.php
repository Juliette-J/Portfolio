<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkImageHashsRequest extends FormRequest
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
            'id_image' => 'required|integer|exist:images,id',
            'id_hashtag' => 'required|integer|exist:hashtag,id'
        ];
    }
}
