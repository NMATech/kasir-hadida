<?php

namespace App\Controllers;

use App\Models\Barang;

class BarangController extends BaseController
{
    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new Barang();
    }

    public function addBarang()
    {
        // ambil data
        $namaBarang = $this->request->getPost('create_name_barang');
        $categoryId = $this->request->getPost('create_category_id');
        $modal = $this->request->getPost('create_modal');
        $hargaJual = $this->request->getPost('create_harga_jual');

        $datas = [
            'nama_barang' => $namaBarang,
            'category_id' => $categoryId,
            'modal' => $modal,
            'harga_jual' => $hargaJual,
        ];

        $this->barangModel->addData($datas);

        return redirect()->back()->with('success', 'Berhasil menambahkan barang baru!');
    }
}
