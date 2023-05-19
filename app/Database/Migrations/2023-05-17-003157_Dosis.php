<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosis extends Migration
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
        $this->forge->createTable('dosis');
        $this->db->table('dosis')->insertBatch([
            [
                'angka' => 250,
                'satuan' => 'mg',
                'keterangan' => 'tablet',
            ],
            [
                'angka' => 500,
                'satuan' => 'mg',
                'keterangan' => 'tablet',
            ],
            [
                'angka' => 100,
                'satuan' => 'mg/ml',
                'keterangan' => 'drop',
            ],
            [
                'angka' => 125,
                'satuan' => 'mg/5ml',
                'keterangan' => 'sendok teh',
            ],
            [
                'angka' => 250,
                'satuan' => 'mg/5ml',
                'keterangan' => 'sendok teh',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('dosis');
    }
}
