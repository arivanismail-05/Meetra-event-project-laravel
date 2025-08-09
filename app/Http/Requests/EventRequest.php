<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:225',
            'location' => 'required|string|max:225',
            'image' => 'required|mimes:png,jpg|max:2048',
            'start_event' => 'required|date|after_or_equal:today',
            'end_event' => 'required|date|after_or_equal:start_event',
            'body' => 'required|string',
        ];
    }
}
