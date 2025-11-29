<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['id', 'nama_barang', 'category_id', 'modal', 'harga_jual', 'harga_ecer', 'keuntungan', 'keuntungan_ecer', 'created_at', 'updated_at'];

    protected $db;
    protected $builder;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('barang');
    }

    public function getAllData()
    {
        $datas = $this->builder->get()->getResultArray();

        return $datas;
    }

    public function addData($datas)
    {
        helper('text');
        $id = random_string('alnum', 16);

        $data = [
            'id' => $id,
            'nama_barang' => $datas['nama_barang'],
            'category_id' => $datas['category_id'],
            'modal' => $datas['modal'],
            'harga_jual' => $datas['harga_jual'],
            'keuntungan' => $datas['harga_jual'] - $datas['modal'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        return $this->builder->insert($data);
    }
}
