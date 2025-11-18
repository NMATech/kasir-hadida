<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 120
            ],
            'category_name' => [
                'type' => 'VARCHAR',
                'constraint' => 120
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
        $this->forge->createTable('category_barang');
    }

    public function down()
    {
        $this->forge->dropTable('category_barang');
    }
}
