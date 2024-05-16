# OpenAPI\Client\CatalogApi

All URIs are relative to /api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createCatalog()**](CatalogApi.md#createCatalog) | **GET** /examples/{id} | Создание обьекта типа каталог |


## `createCatalog()`

```php
createCatalog($id, $include)
```

Создание обьекта типа каталог

Создание обьекта типа каталог

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\CatalogApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 1; // int | Числовой id
$include = 'include_example'; // string | Связанные сущности для подгрузки, через запятую

try {
    $apiInstance->createCatalog($id, $include);
} catch (Exception $e) {
    echo 'Exception when calling CatalogApi->createCatalog: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Числовой id | |
| **include** | **string**| Связанные сущности для подгрузки, через запятую | [optional] |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
