<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbsensiRequest extends FormRequest
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
            'children_id'=>'required|exists:childrens,id', 
            'foto' => 'image',
            'video' => 'mimes:mp4,mov,ogg,qt,x-ms-wmv|max:20000',
        ];
    }
}
