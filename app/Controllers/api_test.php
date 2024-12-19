<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Database\BaseConnection;

class Api extends ResourceController
{
    protected $db;

    public function __construct()
    {
        // โหลดฐานข้อมูล
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // ดึงข้อมูลทั้งหมดจากตาราง
        $query = $this->db->query("SELECT * FROM your_table_name");
        $data = $query->getResult(); // แปลงผลลัพธ์เป็น array
        return $this->respond($data);
    }

    public function show($id = null)
    {
        // ดึงข้อมูลเฉพาะที่มี id ตรงกัน
        $query = $this->db->query("SELECT * FROM your_table_name WHERE id = ?", [$id]);
        $data = $query->getRow(); // ดึงข้อมูลแถวเดียว
        if ($data) {
            return $this->respond($data);
        }
        return $this->failNotFound('ไม่พบข้อมูล');
    }

    public function create()
    {
        $input = $this->request->getPost(); // รับข้อมูลจาก POST
        $sql = "INSERT INTO your_table_name (column1, column2, column3) VALUES (?, ?, ?)";
        $result = $this->db->query($sql, [$input['column1'], $input['column2'], $input['column3']]);

        if ($result) {
            return $this->respondCreated(['status' => 'success', 'data' => $input]);
        }
        return $this->fail('Failed to create data');
    }

    public function update($id = null)
    {
        $input = $this->request->getRawInput(); // รับข้อมูลจาก PUT
        $sql = "UPDATE your_table_name SET column1 = ?, column2 = ? WHERE id = ?";
        $result = $this->db->query($sql, [$input['column1'], $input['column2'], $id]);

        if ($result) {
            return $this->respond(['status' => 'success', 'data' => $input]);
        }
        return $this->fail('Failed to update data');
    }

    public function delete($id = null)
    {
        $sql = "DELETE FROM your_table_name WHERE id = ?";
        $result = $this->db->query($sql, [$id]);

        if ($result) {
            return $this->respondDeleted(['id' => $id, 'status' => 'success']);
        }
        return $this->fail('Failed to delete data');
    }
}
