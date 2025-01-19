<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

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
//            'email' => [
//                'required',
//                'string',
//                'lowercase',
//                'email',
//                'max:255',
//                Rule::unique(User::class)->ignore($this->user()->id),
//            ],
            'bio' => ['required', 'string', 'max:1000'],
            'location' => ['required', 'string', 'max:255'],
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

            throw new HttpResponseException(
                    response($view, 200)
            );
        }

        // For regular requests, use the default behavior
        parent::failedValidation($validator);
    }

}
