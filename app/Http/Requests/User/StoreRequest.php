<?php

namespace App\Http\Requests\User;

use Illuminate\Support\Str;
use App\Http\Requests\FormRequest;
use Illuminate\Validation\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator as Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'username' => Str::lower($this->username),
            'email' => Str::lower($this->email),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'min:4', 'max:32', 'unique:users'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ];
    }

    /**
     * Get the "after" validation callables for the request.
     */
    public function after(): array
    {
        return [
            function (Validator $validator): void {
                $rules = [

                    // Only alpha numeric values with dots or dashes or underscores allowed

                    Rule::make($this->all('username'), [
                        'username' => ['regex:/^[a-z0-9_.-]+$/'],
                    ], [
                        'username.regex' => ':attribute must only contain letters, numbers and dots or dashes or underscores.',
                    ], $this->attributes()),

                    // Only alpha numeric characters allowed at the start and end of the value

                    Rule::make($this->all('username'), [
                        'username' => ['regex:/^[a-z0-9].*[a-z0-9]$/'],
                    ], [
                        'username.regex' => ':attribute must start and end with a letter or number.',
                    ], $this->attributes()),

                    // Only one of the following types of special characters is allowed: dots or dashes or underscores
                    // For example "pass.word.valid" is allowed but "pass.word-invalid" is not

                    Rule::make($this->all('username'), [
                        'username' => ['not_regex:/^.*(((\.).*(_|-))|((_).*(\.|-))|((-).*(\.|_))).*$/'],
                    ], [
                        'username.not_regex' => 'Only one type of a special character (dots or dashes or underscores) is allowed for the :attribute.',
                    ], $this->attributes()),

                    // Special characters cannot be repeated multiple times in a row
                    // For example "password.valid" is allowed but "password..invalid" is not

                    Rule::make($this->all('username'), [
                        'username' => ['not_regex:/^.*(\.{2,}|_{2,}|-{2,}).*$/'],
                    ], [
                        'username.not_regex' => 'Multiple special characters in a row are not allowed for the :attribute.',
                    ], $this->attributes()),

                ];

                foreach ($rules as $rule) {
                    if ($rule->fails()) {
                        $validator->errors()->add(
                            'username',
                            $rule->getMessageBag()->get('username')[0]
                        );
                    }
                }
            },
        ];
    }
}
