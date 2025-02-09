<?php

namespace App\Models;

use CodeIgniter\Model;

class ApiKeyModel extends Model
{
    protected $table = 'api_keys';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'api_key', 'created_at'];

    protected $useTimestamps = true; // เปิดใช้ created_at, updated_at

    public function generateApiKey($userId)
    {
        $apiKey = bin2hex(random_bytes(32)); // สร้าง API Key แบบสุ่ม 64 ตัวอักษร

        // // ตรวจสอบว่าผู้ใช้มีอยู่จริงหรือไม่ (แนะนำ)
        // $userModel = new \App\Models\UserModel(); 
        // if (!$userModel->find($userId)) {
        //     return false; // หากไม่พบผู้ใช้
        // }

        $this->insert([
            'user_id' => $userId,
            'api_key' => $apiKey
        ]);

        return $apiKey;
    }

    public function verifyApiKey($apiKey)
    {
        return $this->where('api_key', $apiKey)->first();
    }
}
