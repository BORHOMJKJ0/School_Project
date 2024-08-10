<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:students,name',
            'age' => 'required|numeric',
            'class' => 'required|string',
            'number' => 'required|numeric|unique:students,number',
            'avg' => 'required|numeric',
        ];
    }
}
