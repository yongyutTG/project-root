<?php

namespace App\Models;

use CodeIgniter\Model;

class ApiModel extends Model
{
    protected $table      = 'user_api';  // ชื่อตาราง
    protected $primaryKey = 'id';        // คีย์หลักของตาราง
    protected $allowedFields = ['fname', 'lname', 'email']; // ระบุฟิลด์ที่สามารถเพิ่ม/แก้ไขได้


    public function getAll()
    {
        $query = $this->db->query("SELECT * FROM user_api");
        return $query->getResult(); // แปลงผลลัพธ์เป็น array
    }
    

    public function getById($id)
    {
        $query = $this->db->query("SELECT * FROM user_api WHERE id = ?", [$id]);
        return $query->getRow(); // ดึงเฉพาะ 1 แถว
    }


    public function insertData($data)
    {
        $sql = "INSERT INTO user_api (firstname, lastname, email) VALUES (?, ?, ?)";
        return $this->db->query($sql, [$data['firstname'], $data['lastname'], $data['email']]);
    }


  
    public function updateData($id, $data)
    {
        $sql = "UPDATE user_api SET firstname = ?, lastname = ?, email = ? WHERE id = ?";
        return $this->db->query($sql, [$data['firstname'], $data['lastname'], $data['email'], $id]);
    }
    


    public function deleteData($id)
    {
        return $this->db->query("DELETE FROM user_api WHERE id = ?", [$id]);
    }
}    
