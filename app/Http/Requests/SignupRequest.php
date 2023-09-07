<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required|unique:users,email',
            'motdepasse'=>'required|min:2',
            'dateNaissance'=>'required',
            'villeNaissance'=>'required',
            'cree_a'=>'required',
            'cpwd'=> 'required|min:2',
            'service'=>'required|exists:services,idSer',
        ];
    }

    protected function prepareForValidation(){
       $this->merge([
        'cree_a' => now(),
       ]);
      
    }
}
