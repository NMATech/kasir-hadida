<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['id', 'nama_barang', 'category_id', 'modal', 'harga_jual', 'keuntungan', 'created_at', 'updated_at'];

    protected $db;
    protected $builder;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('barang');
    }

    public function getData()
    {
        $datas = $this->builder->get()->getResultArray();
        $data = $datas[0];

        return $data;
    }
}
