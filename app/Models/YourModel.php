<?php

namespace App\Models;

use CodeIgniter\Model;

class YourModel extends Model
{
    protected $table      = 'user_api';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstname', 'lastname', 'email']; // ระบุฟิลด์ที่อนุญาตให้เพิ่ม/แก้ไข
}
