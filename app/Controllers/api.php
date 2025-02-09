<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ApiModel;

class api extends ResourceController
{
    protected $apiModel;

    public function __construct()
    {
        $this->apiModel = new ApiModel();
    }


    public function index()
    {
        
        $data = $this->apiModel->getAll();
        if (!empty($data)) {
            return $this->respond([
                'status' => 'success',
                'message' => 'เรียกข้อมูลสำเร็จ',
                'data' => $data
            ], 200);
        } else {
            return $this->respond([
                'status' => 'error',
                'message' => 'ไม่พบข้อมูล',
                'data' => null
            ], 404);
        }
        // return $this->respond(['status' => 'success', 'data' => $data]);
    }

    public function show($id = null)
    {
        $data = $this->apiModel->getById($id);
        if ($data) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'เรียกข้อมูลสำเร็จ',
                'data' => $data
           ], 200);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'ไม่พบข้อมูล',
                'data' => null
           ], 404);
        }
    }


    public function create()
    {
        $input = $this->request->getJSON(true);
        
        if ($this->apiModel->insertData($input)) {
            return $this->respondCreated(['status' => 'success', 'message' => 'เพิ่มข้อมูลสำเร็จ']);
        }
        return $this->fail('เพิ่มข้อมูลไม่สำเร็จ');
    }


    public function update($id = null)
    {
        $input = $this->request->getRawInput();
        if ($this->apiModel->updateData($id, $input)) {
            return $this->respond(['status' => 'success', 'message' => 'อัปเดตข้อมูลสำเร็จ']);
        }
        return $this->fail('อัปเดตข้อมูลไม่สำเร็จ');
    }

    public function delete($id = null)
    {
        if ($this->apiModel->deleteData($id)) {
            return $this->respondDeleted(['status' => 'success', 'message' => 'ลบข้อมูลสำเร็จ']);
        }
        return $this->failNotFound('ไม่พบข้อมูลที่จะลบ');
    }
}
