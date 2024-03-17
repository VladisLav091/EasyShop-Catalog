<?php

namespace App\Domain\News\Actions;

use App\Domain\News\Models\Catalog;

class CreateCatalogAction
{
    public function execute(array $fields): Catalog
    {
        // Создание новой записи в базе данных на основе переданных полей
        $catalog = Catalog::create($fields);

        // Возвращаем созданный объект каталога
        return $catalog;
    }
}

