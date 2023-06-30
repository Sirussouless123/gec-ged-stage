<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
           
            'nomDoc'=>'required|min:2|string',
            'numeroVersion'=>'required|integer',
            'type'=>'required|string|min:2',
            'document'=>'required|file',
            'service_id'=>'required|exists:services,idSer',
            'description'=>'required'
        ];
    }
}
