<?php

namespace App\Controllers;

use App\Models\Category;

class Home extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('pages/dashboard', $data);
    }

    public function barangPage()
    {
        $data = [
            'title' => 'Barang'
        ];

        return view('pages/barang', $data);
    }

    public function transaksiPage()
    {
        $data = [
            'title' => 'Transaksi'
        ];

        return view('pages/transaksi', $data);
    }

    public function penjualanPage()
    {
        $data = [
            'title' => 'Penjualan'
        ];

        return view('pages/penjualan', $data);
    }

    public function kategoriPage()
    {
        helper('text');
        $category = $this->categoryModel->getAllData();

        $data = [
            'title' => 'Kategori Barang',
            'category' => $category
        ];

        return view('pages/kategori', $data);
    }
}
