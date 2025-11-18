<?php

namespace App\Controllers;

class CategoryController extends BaseController
{
    public function addCategory()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('pages/dashboard', $data);
    }
}
