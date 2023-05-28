<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TempPembelian extends Migration
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
            'stok_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'jumlah' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('stok_id', 'stok', 'id');
        $this->forge->createTable('temp_pembelian');
    }

    public function down()
    {
        $this->forge->dropTable('temp_pembelian');
    }
}
