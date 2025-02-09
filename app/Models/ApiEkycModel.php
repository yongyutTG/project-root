<?php
namespace App\Models;
use CodeIgniter\Model;

class ApiEkycModel extends Model{
    protected $db;

    public function __construct(){
        $this->db = \Config\Database::connect();}
   
    public function getAllDetails()
{
     $query = $this->db->query("
     select m.*,
        e.date_ekyc,
        e.user_id,
        e.max_address
    from member m
    join ekyc_detail e on m.mem_id");
    return $query->getResult(); 
}

public function getDetailById($id){
    $query = $this->db->query("  
    select  m.*, 
        e.date_ekyc, 
        e.user_id,
        e.max_address 
    from member m
    join ekyc_detail e on m.mem_id = e.mem_id where m.id = ?", [$id]); 
    return $query->getRow();
    // var_dump ($query->getRow());
    // exit(); 
}
}