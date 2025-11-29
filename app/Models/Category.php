<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
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

    public function searchData($categoryId)
    {
        $datas = $this->builder->where('id', $categoryId)->get()->getRowArray();

        return $datas;
    }

    public function getAllData()
    {
        $datas = $this->builder->get()->getResultArray();

        return $datas;
    }

    public function addData($namaBarang)
    {
        helper('text');
        $id = random_string('alnum', 16);

        $data = [
            'id' => $id,
            'category_name' => $namaBarang,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->builder->insert($data);

        return redirect()->back();
    }

    public function editData($categoryId, $newName)
    {
        $this->builder->where('id', $categoryId)->set('category_name', $newName)->update();
    }

    public function deleteData($categoryId)
    {
        $this->builder->where('id', $categoryId)->delete();
    }
}
