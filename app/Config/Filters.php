<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    
    // public array $globals = [
    //     'before' => [
    //         // 'honeypot',
    //         // 'csrf',
    //         // 'invalidchars',
    //     ],
    //     'after' => [
    //         'toolbar',
    //         // 'honeypot',
    //         // 'secureheaders',
    //     ],
    // ];
    public $aliases = [
        'apiKeyAuth' => \App\Filters\ApiKeyAuth::class,
        'tokenAuth' => \App\Filters\TokenAuth::class,
    ];
    
    public $globals = [
        'before' => [ ],
        'after' => [],
    ];
   
    public $filters = [
        'apiKeyAuth' => [
            'before' => [
                'api/protected-endpoint',  // ให้ตรวจสอบเฉพาะ API ที่ต้องการป้องกัน
                'api/validate-api-key',
            ]
        ], // Added missing closing bracket and comma here
        'tokenAuth' => [
            'before' => [
                'api/protected-endpoint',  // ให้ตรวจสอบเฉพาะ API ที่ต้องการป้องกัน
                'api/validate-api-key',
            ]
        ]
    ];
    
    
  
    
   }
