<?php

namespace App\Http\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class AddCategoryToProductRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer'],
        ];
    }
}
