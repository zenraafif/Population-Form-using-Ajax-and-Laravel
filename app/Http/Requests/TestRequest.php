<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
            'nama' => 'required|min:2',
            'nik' => 'required',
        ];
    }

    public function messages(){
        'nama.required' => 'nama tidak boleh kosong',
        'nama.min'=> 'nama Minimal 2 karakter',
        'nik.required' => 'NIK harus kosong!',
    }
}
