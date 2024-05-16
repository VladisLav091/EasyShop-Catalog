<?php

namespace App\Http\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class CreateCategoryRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'description' => ['string'],
            'name' => ['required', 'string'],
        ];
    }
}
