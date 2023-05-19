<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Obat extends Migration
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
            'nama' => [
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
                'null' => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('nama');
        $this->forge->createTable('obat');
        $this->db->table('obat')->insertBatch([
            [
                'nama' => 'Amoxilin',
                'keterangan' => 'Untuk mengobati infeksi bakteri',
            ],
            [
                'nama' => 'Asam Mefenamat',
                'keterangan' => 'Untuk mengobati nyeri ringan hingga sedang',
            ],
            [
                'nama' => 'Asam Traneksamat',
                'keterangan' => 'Untuk mengobati pendarahan hebat',
            ],
            [
                'nama' => 'Aspirin',
                'keterangan' => 'Untuk mengobati nyeri ringan hingga sedang',
            ],
            [
                'nama' => 'Azithromycin',
                'keterangan' => 'Untuk mengobati infeksi bakteri',
            ],
            [
                'nama' => 'Bactroban',
                'keterangan' => 'Untuk mengobati infeksi bakteri',
            ],
            [
                'nama' => 'Baclofen',
                'keterangan' => 'Untuk mengobati nyeri otot',
            ],
            [
                'nama' => 'Beclomethasone',
                'keterangan' => 'Untuk mengobati asma',
            ],
            [
                'nama' => 'Benadryl',
                'keterangan' => 'Untuk mengobati alergi',
            ],
            [
                'nama' => 'Betadine',
                'keterangan' => 'Untuk antiseptik',
            ],
            [
                'nama' => 'Bisolvon',
                'keterangan' => 'Untuk mengobati batuk',
            ],
            [
                'nama' => 'Bisoprolol',
                'keterangan' => 'Untuk mengobati hipertensi',
            ],
            [
                'nama' => 'Bodrex',
                'keterangan' => 'Untuk mengobati nyeri ringan hingga sedang',
            ],
            [
                'nama' => 'Bromhexine',
                'keterangan' => 'Untuk mengobati batuk',
            ],
            [
                'nama' => 'Budesonide',
                'keterangan' => 'Untuk mengobati asma',
            ],
            [
                'nama' => 'Bupropion',
                'keterangan' => 'Untuk mengobati depresi',
            ],
            [
                'nama' => 'Buspirone',
                'keterangan' => 'Untuk mengobati kecemasan',
            ],
            [
                'nama' => 'Captopril',
                'keterangan' => 'Untuk mengobati hipertensi',
            ],
            [
                'nama' => 'Carvedilol',
                'keterangan' => 'Untuk mengobati hipertensi',
            ],
            [
                'nama' => 'Cataflam',
                'keterangan' => 'Untuk mengobati nyeri ringan hingga sedang',
            ],
            [
                'nama' => 'Cefadroxil',
                'keterangan' => 'Untuk mengobati infeksi bakteri',
            ],
            [
                'nama' => 'Cefixime',
                'keterangan' => 'Untuk mengobati infeksi bakteri',
            ],
            [
                'nama' => 'Cefspan',
                'keterangan' => 'Untuk mengobati infeksi bakteri',
            ],
            [
                'nama' => 'Celecoxib',
                'keterangan' => 'Untuk mengobati nyeri ringan hingga sedang',
            ],
            [
                'nama' => 'Cetirizine',
                'keterangan' => 'Untuk mengobati alergi',
            ],
            [
                'nama' => 'Chlorthalidone',
                'keterangan' => 'Untuk mengobati hipertensi',
            ],
            [
                'nama' => 'Ciprofloxacin',
                'keterangan' => 'Untuk mengobati infeksi bakteri',
            ],
            [
                'nama' => 'Citalopram',
                'keterangan' => 'Untuk mengobati depresi',
            ],
            [
                'nama' => 'Clarithromycin',
                'keterangan' => 'Untuk mengobati infeksi bakteri',
            ],
            [
                'nama' => 'Clonazepam',
                'keterangan' => 'Untuk mengobati kecemasan',
            ],
            [
                'nama' => 'Clopidogrel',
                'keterangan' => 'Untuk mengobati penyakit jantung',
            ],
            [
                'nama' => 'Codeine',
                'keterangan' => 'Untuk mengobati nyeri ringan hingga sedang',
            ],
            [
                'nama' => 'Cyclobenzaprine',
                'keterangan' => 'Untuk mengobati nyeri otot',
            ],
            [
                'nama' => 'Dexamethasone',
                'keterangan' => 'Untuk mengobati peradangan',
            ],
            [
                'nama' => 'Dextamine',
                'keterangan' => 'Untuk mengobati alergi',
            ],
            [
                'nama' => 'Dextro',
                'keterangan' => 'Untuk mengobati depresi',
            ],
            [
                'nama' => 'Diazepam',
                'keterangan' => 'Untuk mengobati kecemasan',
            ],
            [
                'nama' => 'Diclofenac',
                'keterangan' => 'Untuk mengobati nyeri ringan hingga sedang',
            ],
            [
                'nama' => 'Dicloxacillin',
                'keterangan' => 'Untuk mengobati infeksi bakteri',
            ],
            [
                'nama' => 'Diltiazem',
                'keterangan' => 'Untuk mengobati hipertensi',
            ],
            [
                'nama' => 'Diphenhydramine',
                'keterangan' => 'Untuk mengobati alergi',
            ],
            [
                'nama' => 'Domeperidone',
                'keterangan' => 'Untuk mengobati mual dan muntah',
            ],
            [
                'nama' => 'Donepezil',
                'keterangan' => 'Untuk mengobati Alzheimer',
            ],
            [
                'nama' => 'Doxycycline',
                'keterangan' => 'Untuk mengobati infeksi bakteri',
            ],
            [
                'nama' => 'Duloxetine',
                'keterangan' => 'Untuk mengobati depresi',
            ],
            [
                'nama' => 'Paracetamol',
                'keterangan' => 'Untuk mengobati nyeri ringan hingga sedang',
            ],
            [
                'nama' => 'Promag',
                'keterangan' => 'Untuk mengobati maag',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('obat');
    }
}
