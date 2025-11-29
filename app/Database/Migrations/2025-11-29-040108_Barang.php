<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 120
            ],
            'nama_barang' => [
                'type' => 'VARCHAR',
                'constraint' => 120
            ],
            'category_id' => [
                'type' => 'VARCHAR',
                'constraint' => 120
            ],
            'modal' => [
                'type' => 'DECIMAL',
                'constraint' => '12,2'
            ],
            'harga_jual' => [
                'type' => 'DECIMAL',
                'constraint' => '12,2'
            ],
            'keuntungan' => [
                'type' => 'DECIMAL',
                'constraint' => '12,2'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
