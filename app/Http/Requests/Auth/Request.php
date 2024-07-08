<?php

namespace App\Http\Requests\Auth;

use Illuminate\Support\Str;
use App\Http\Requests\FormRequest;
use App\Repositories\UserRepository;

class Request extends FormRequest
{
    public function __construct(private UserRepository $userRepository)
    {}

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
            'login' => Str::lower($this->login)
        ]);
    }

    /**
     * Handle a passed validation attempt.
     */
    protected function passedValidation(): void
    {
        $user = $this->userRepository->findBy(
            ['username', 'email'],
            $this->login,
            ['email']
        );
        
        $this->merge([
            'email' => $user?->email,
            'remember' => (bool) $this->remember
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
            'login' => ['required'],
            'password' => ['required'],
        ];
    }
}
