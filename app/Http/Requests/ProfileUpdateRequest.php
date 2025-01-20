<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string', 'max:1000'],
            'location' => ['required', 'string', 'min:3', 'max:255'],
        ];
    }


    protected function failedValidation(Validator $validator): void
    {
        if ($this->header('HX-Request')) {
            // For HTMX requests, throw a new exception with the view
            $view = view('test.show', [
                'isEditing' => true,
                'user' => auth()->user(),
            ])
                ->withErrors($validator);

            // flash the input values back to get the OLD value
            $this->flash();

            // we have to use 200 status code for HTMX requests
            $response = response($view, 200);

            throw new ValidationException($validator, $response);
        }

        // For regular requests, use the default behavior
        parent::failedValidation($validator);
    }

}
