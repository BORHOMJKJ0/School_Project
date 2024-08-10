<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50' | 'unique:Student,name',
            'age' => 'required|numeric|max:3',
            'class' => 'required|string|max:50',
            'number' => 'required|numeric|max:250|unique:Student,number',
            'avg' => 'required|numeric|max:10',
        ];
    }
}
