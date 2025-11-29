<?php

namespace App\Controllers;

use App\Models\Barang;
use App\Models\Category;

class Home extends BaseController
{
    protected $categoryModel;
    protected $barangModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
        $this->barangModel = new Barang();
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
        $category = $this->categoryModel->getAllData();
        $barang = $this->barangModel->getAllData();

        $data = [
            'title' => 'Barang',
            'category' => $category,
            'barang' => $barang
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
