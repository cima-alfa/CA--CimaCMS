<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Contracts\Form;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as HttpFormRequest;

abstract class FormRequest extends HttpFormRequest
{
    /**
     * Form definition instance
     */
    private ?Form $form = null;

    /**
     * Set the form definition
     *
     * @param  App\Contracts\Form|null  $form  Form definition instance
     */
    protected function setForm(?Form $form): void
    {
        $this->form = $form;
    }

    /**
     * Get the form definition
     *
     * @return App\Contracts\Form|null Form definition instance
     */
    protected function getForm(): ?Form
    {
        return $this->form;
    }

    /**
     * Handle a failed validation attempt.
     *
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator): void
    {
        request()->merge($this->input());

        parent::failedValidation($validator);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'username' => 'Username',
            'email' => 'E-Mail',
            'password' => 'Password',
            'login' => 'E-Mail or Username',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => ':attribute is required.',
            'min' => ':attribute must be at least :min characters.',
            'max' => ':attribute must not be greater than :max characters.',
            'email' => ':attribute must be a valid email address. ',
            'confirmed' => ':attribute confirmation does not match.',
            'password.letters' => ':attribute must contain at least one letter. ',
            'password.mixed' => ':attribute must contain at least one uppercase and one lowercase letter.',
            'password.numbers' => ':attribute must contain at least one number.',
            'password.symbols' => ':attribute must contain at least one symbol.',
            'unique' => ':attribute has already been taken.',
        ];
    }
}
