<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;

class News extends Controller{
    public function index()
    {
        $model = new NewsModel();

        $data = [
            'news' => $model->getNews(),
            'teltle' => 'new archive'
        ];
        echo view('templates/header', $data);
        echo view('news/overview', $data);
        echo view('templates/footer', $data);
    }

    public function view($slug = null){
        
        $model = new NewsModel();

        $data['news'] = $model->getNews($slug);
        if (empty($data['news'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item'.$slug); //ถ้าไม่มีให้ 404
        }

        $data['title'] = $data['news']['tetle'];
        echo view('templates/header', $data);
        echo view('news/views', $data);
        echo view('templates/footer', $data);
    }
}