<?php

namespace App\Controllers;

class Home extends BaseController
{
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
}
