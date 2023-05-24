<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kemasan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'angka' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ],
            'satuan' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => date('Y-m-d H:i:s')
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'default' => date('Y-m-d H:i:s')
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['angka', 'satuan', 'keterangan']);
        $this->forge->createTable('kemasan');
    }

    public function down()
    {
        $this->forge->dropTable('kemasan');
    }
}
