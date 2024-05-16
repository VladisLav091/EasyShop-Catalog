<?php

namespace App\Http\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class UpdateProductRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer'],
            'stock' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'description' => ['nullable', 'string'],
            'name' => ['required', 'string'],
        ];
    }
}
