<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'name' =>  [
                Rule::unique('projects')->ignore($this->project), 'required', 'max:150', 'min:3'
            ],
            'gitUrl' => 'required|max:255|min:3',
            'framework_id' => 'required',
            'tecnologies' => 'required|max:255|min:3',
            'description' => 'required|min:10',
        ];
    }
}
