<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ApiEkycModel;

class ApiEkycController extends ResourceController
{
    // protected $filters = ['tokenAuth'];
    protected $db;
    protected $ApiEkycModel;

    public function __construct(){
        $this->ApiEkycModel = new ApiEkycModel(); 
    }
    
    public function index(){
        $data = $this->ApiEkycModel->getAllDetails(); 
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
                'data' => []
            ], 404);
        }
    }
   
   
     public function show($id = null){
        
         // เรียกฟังก์ชันจากโมเดลเพื่อดึงข้อมูลตาม mem_id
         $data = $this->ApiEkycModel->getDetailById($id);
         if ($data) {
             return $this->response->setJSON([
                 'status' => 'success',
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
     
     
}
