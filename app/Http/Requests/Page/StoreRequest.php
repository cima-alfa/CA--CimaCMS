<?php

declare(strict_types=1);

namespace App\Http\Requests\Page;

use App\Components\Forms\CreatePageForm;
use App\Http\Requests\FormRequest;

class StoreRequest extends FormRequest
{
    public function __construct(CreatePageForm $form)
    {
        $this->setForm($form);
    }

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
            //
        ];
    }
}
