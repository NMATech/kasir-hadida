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
        $codeQr = $this->request->getPost('create_code_qr');
        // ambil data modal dan harga jual
        $modal = $this->request->getPost('create_modal');
        $hargaJual = $this->request->getPost('create_harga_jual');

        $datas = [
            'nama_barang' => $namaBarang,
            'category_id' => $categoryId,
            'code_qr' => $codeQr,
            'modal' => $modal,
            'harga_jual' => $hargaJual,
        ];

        $this->barangModel->addData($datas);

        return redirect()->back()->with('success', 'Berhasil menambahkan barang baru!');
    }

    public function editBarang($id)
    {
        // ambil data
        $namaBarang = $this->request->getPost('edit_name_barang');
        $categoryId = $this->request->getPost('edit_category_id');
        $codeQr = $this->request->getPost('edit_code_qr');
        $modal = $this->request->getPost('edit_modal');
        $hargaJual = $this->request->getPost('edit_harga_jual');

        $datas = [
            'nama_barang' => $namaBarang,
            'category_id' => $categoryId,
            'code_qr' => $codeQr,
            'modal' => $modal,
            'harga_jual' => $hargaJual,
        ];

        $this->barangModel->updateData($id, $datas);

        return redirect()->back()->with('success', 'Berhasil mengupdate barang!');
    }

    public function deleteBarang($id)
    {
        $this->barangModel->deleteData($id);

        return redirect()->back()->with('success', 'Berhasil menghapus barang!');
    }
}
