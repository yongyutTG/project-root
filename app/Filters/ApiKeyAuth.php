<?php

namespace App\Filters;

use App\Models\ApiKeyModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class ApiKeyAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $apiKey = $request->getHeaderLine('X-API-Key');

        if (!$apiKey) {
            return service('response')->setJSON(['message' => 'ไม่อนุญาติให้ใช้บริการ'])->setStatusCode(401);
        }

        $model = new ApiKeyModel();
        if (!$model->verifyApiKey($apiKey)) {
            return service('response')->setJSON(['message' => 'API Key ไม่ถูกต้อง'])->setStatusCode(401);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
