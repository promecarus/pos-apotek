<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Role extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('roles');
        $this->db->table('roles')->insertBatch([
            ['role' => 'Super Admin'],
            ['role' => 'Administrator'],
            ['role' => 'Kasir'],
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('roles');
    }
}
