<?php

namespace App\Http\Requests;

use App\Enums\BookCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateNewBookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'collector_id' => [
                'required',
                'exists:collectors,id',
            ],

            'title' => [
                'required',
                'string',
                'unique:books,title',
            ],

            'category' => [
                'required',
                new Enum(BookCategory::class),
            ],
        ];
    }
}
