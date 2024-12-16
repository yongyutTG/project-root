<?php

namespace App\Controllers;

use CodeIgniter\Controller;


class Pages extends Controller
{
    public function index(){
        return view('welcome_message');
    }
    
    
    public Function view($pages = 'home'): void{
        if(!is_file(APPPATH.'Views/pages/'.$pages.'.php')){
            throw new \CodeIgniter\Exceptions\PageNotFoundException($pages); //ถ้าไม่มีให้ 404
        }
        
            $data['title'] = ucfirst($pages);
            echo view('templates/header',$data);
            echo view('pages/'.$pages,$data);
            echo view('templates/footer',$data);
        
        
    }
}          
