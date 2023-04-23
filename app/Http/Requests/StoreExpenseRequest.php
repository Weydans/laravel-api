<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
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
            "user_id"     => "required|exists:users,id",
            "description" => "required|min:3|max:191",
            "date"        => "required|date|before_or_equal:" . now()->format('Y-m-d'),
            "value"       => "required|decimal:2|min:0.01",
        ];
    }
}
