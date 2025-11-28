<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }

    public function addCategory()
    {
        // ambil data
        $categoryName = $this->request->getPost('create_name_category');

        $this->categoryModel->addData($categoryName);

        return redirect()->back()->with('success', 'Berhasil menambahkan category baru!');
    }

    public function editCategory($categoryId)
    {
        // ambil data
        $categoryName = $this->request->getPost('edit_name_category');

        // update data
        $this->categoryModel->editData($categoryId, $categoryName);

        return redirect()->back()->with('success', 'Berhasil mengedit category baru');
    }
}
