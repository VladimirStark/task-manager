<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'preview' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'file' => ['required','file', 'max:5120'],
            'priority' => ['boolean']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Название задачи не заполнено!',
            'name.max' => 'Слишком длинное название!',
            'preview.required' => 'Краткое описание задачи не заполнено!',
            'preview.max' => 'Слишком длинное краткое описание!'
        ];
    }
}
