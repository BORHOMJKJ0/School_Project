<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:250|unique:students,name',
            'age' => 'required|numeric|max:20',
            'class' => 'required|string|max:150',
            'number' => 'required|numeric|unique:students,number',
            'avg' => 'required|numeric|max:100',
        ];
    }
}
