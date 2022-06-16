<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YearEditRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'data.name' => 'Año',
        ];
    }

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
            'data.name' => 'required|unique:years,name,'.$this->segment(3) . ',id',
        ];
    }
}
