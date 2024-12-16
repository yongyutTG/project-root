<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    // MVC
    //http://example.com/news/latest/10
    //http://example.com /[Controller-class] /Controller-Method / Argement

}          
