<?php

namespace App\Controllers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use CodeIgniter\RESTful\ResourceController;

class JwtController extends ResourceController
{
    private $secretKey;
    public function __construct(){
        $this->secretKey = getenv('JWT_SECRET_KEY');
    }

    // สร้าง JWT Token
    public function createToken()
    {
        $issuedAt = time(); // เวลาเริ่มต้น
        $expirationTime = $issuedAt + 3600; // เวลาหมดอายุ (1 ชั่วโมง)
        $payload = [
            'iat' => $issuedAt,
            'exp' => $expirationTime,
            'data' => [
                'id' => 1,
                'username' => 'exampleuser',
                'role' => 'admin'
            ]
        ];

        // สร้าง Token
        $token = JWT::encode($payload, $this->secretKey, 'HS256');

        return $this->respond([
            'status' => 'success',
            'token' => $token
        ]);
    }

    // ตรวจสอบ JWT Token
    public function verifyToken()
    {
        $authHeader = $this->request->getHeader("Authorization");
        if (!$authHeader) {
            return $this->respond([
                'status' => 'error',
                'message' => 'Authorization header missing'
            ], 401);
        }

        $token = explode(" ", $authHeader->getValue())[1]; // แยก Bearer ออกจาก Token

        try {
            $decoded = JWT::decode($token, new Key($this->secretKey, 'HS256'));
            return $this->respond([
                'status' => 'success',
                'data' => $decoded
            ]);
        } catch (\Exception $e) {
            return $this->respond([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 401);
        }
    }
}
