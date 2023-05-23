<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('roles')->insertBatch([
            ['role' => 'Super Admin'],
            ['role' => 'Administrator'],
            ['role' => 'Kasir'],
        ]);

        $this->db->table('users')->insertBatch([
            [
                'email' => 'superadmin@gmail.com',
                'username' => 'superadmin',
                'password' => password_hash('aaaaaa', PASSWORD_DEFAULT),
                'nama' => 'Super Admin',
                'role_id' => 1,
            ],
            [
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => password_hash('aaaaaa', PASSWORD_DEFAULT),
                'nama' => 'Admin',
                'role_id' => 2,
            ],
            [
                'email' => 'kasir@gmail.com',
                'username' => 'kasir',
                'password' => password_hash('aaaaaa', PASSWORD_DEFAULT),
                'nama' => 'Kasir',
                'role_id' => 3,
            ],
        ]);

        $this->db->table('kemasan')->insertBatch([
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

        $this->db->table('pelanggan')->insertBatch([
            [
                'nama' => 'Muhammad',
                'alamat' => 'Jl. Al',
                'telepon' => '081234567890'
            ],
            [
                'nama' => 'Haikal',
                'alamat' => 'Jl. Am',
                'telepon' => '081234567891'
            ],
            [
                'nama' => 'Al',
                'alamat' => 'Jl. At',
                'telepon' => '081234567892'
            ],
            [
                'nama' => 'Rasyid',
                'alamat' => 'Jl. Alamat',
                'telepon' => '081234567893'
            ]
        ]);

        $this->db->table('stok')->insertBatch([
            [
                'obat_id' => 1,
                'kemasan_id' => 1,
                'jumlah' => 100,
                'kedarluwarsa' => '2021-05-20'
            ],
            [
                'obat_id' => 1,
                'kemasan_id' => 2,
                'jumlah' => 100,
                'kedarluwarsa' => '2021-05-20'
            ],
            [
                'obat_id' => 2,
                'kemasan_id' => 1,
                'jumlah' => 100,
                'kedarluwarsa' => '2021-05-20'
            ],
            [
                'obat_id' => 2,
                'kemasan_id' => 2,
                'jumlah' => 100,
                'kedarluwarsa' => '2021-05-20'
            ],
            [
                'obat_id' => 3,
                'kemasan_id' => 1,
                'jumlah' => 100,
                'kedarluwarsa' => '2021-05-20'
            ],
            [
                'obat_id' => 3,
                'kemasan_id' => 2,
                'jumlah' => 100,
                'kedarluwarsa' => '2021-05-20'
            ],
            [
                'obat_id' => 4,
                'kemasan_id' => 1,
                'jumlah' => 100,
                'kedarluwarsa' => '2021-05-20'
            ],
            [
                'obat_id' => 4,
                'kemasan_id' => 2,
                'jumlah' => 100,
                'kedarluwarsa' => '2021-05-20'
            ],
        ]);

        $this->db->table('pengaturan')->insert([
            'nama' => 'Apotek',
            'alamat' => 'Jl. Apotek',
            'no_telp' => '081234567890',
        ]);
    }
}
