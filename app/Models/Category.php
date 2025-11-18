<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang extends Model
{
    protected $table = 'category_barang';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['id', 'category_name'];

    protected $db;
    protected $builder;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('category_barang');
    }

    public function getData()
    {
        $datas = $this->builder->get()->getResultArray();
        $data = $datas[0];

        return $data;
    }
}
