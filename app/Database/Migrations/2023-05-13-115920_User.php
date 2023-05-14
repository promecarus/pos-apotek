<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 3
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => date('Y-m-d H:i:s')
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => date('Y-m-d H:i:s')
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey([
            'username',
            'email'
        ]);
        $this->forge->addForeignKey('role_id', 'roles', 'id');
        $this->forge->createTable('users');
        $this->db->table('users')->insertBatch([
            [
                'email' => 'superadmin@gmail.com',
                'username' => 'superadmin',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'nama' => 'Super Admin',
                'role_id' => 1,
            ],
            [
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'nama' => 'Admin',
                'role_id' => 2,
            ],
            [
                'email' => 'kasir@gmail.com',
                'username' => 'kasir',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'nama' => 'Kasir',
                'role_id' => 3,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
