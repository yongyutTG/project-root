<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Api extends ResourceController
{
    protected $modelName = 'App\Models\ApiModel';
    protected $format    = 'json'; // รองรับ JSON format


    // public function index()
    // {
    // return $this->respond(['status' => 'OK', 'message' => 'API ทำงาน']);
    // }

    public function index()
    {
        $data = $this->model->findAll();
        if ($data) {
            return $this->respond($data);
        }
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            return $this->respond($data);
        }
        return $this->failNotFound('ไม่พบข้อมูล');
    }

    public function create()
    {
        $input = $this->request->getPost();
        if ($this->model->insert($input)) {
            return $this->respondCreated($input);
        }
        return $this->fail('Failed to create data');
    }

    public function update($id = null)
    {
        $input = $this->request->getRawInput();
        if ($this->model->update($id, $input)) {
            return $this->respond($input);
        }
        return $this->fail('Failed to update data');
    }

    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            return $this->respondDeleted(['id' => $id]);
        }
        return $this->fail('Failed to delete data');
    }
}
