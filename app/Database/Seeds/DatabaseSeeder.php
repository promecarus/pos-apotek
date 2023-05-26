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
                'angka' => 100,
                'satuan' => 'tablet',
                'keterangan' => 'kotak',
            ],
            [
                'angka' => 60,
                'satuan' => 'ml',
                'keterangan' => 'botol',
            ],
            [
                'angka' => 30,
                'satuan' => 'kapsul',
                'keterangan' => 'kotak',
            ],
            [
                'angka' => 30,
                'satuan' => 'tablet',
                'keterangan' => 'kotak',
            ],
            [
                'angka' => 100,
                'satuan' => 'tablet',
                'keterangan' => 'botol',
            ],
            [
                'angka' => 10,
                'satuan' => 'tabung @ 5 gram',
                'keterangan' => 'kotak',
            ],
            [
                'angka' => 10,
                'satuan' => 'botol kecil',
                'keterangan' => 'kotak',
            ],
            [
                'angka' => 50,
                'satuan' => 'kapsul',
                'keterangan' => 'kotak',
            ]
        ]);

        $this->db->table('obat')->insertBatch([
            [
                'nama' => 'Antacid',
                'keterangan' => 'Untuk mengobati sakit maag',
            ],
            [
                'nama' => 'Antacid Suspension',
                'keterangan' => 'Untuk mengobati sakit maag',
            ],
            [
                'nama' => 'Cimetidine 200 mg',
                'keterangan' => 'Untuk mengobati sakit maag',
            ],
            [
                'nama' => 'Omeprazole 20 mg',
                'keterangan' => 'Untuk mengobati sakit maag',
            ],
            [
                'nama' => 'Ranitidine 150 mg',
                'keterangan' => 'Untuk mengobati sakit maag',
            ],
            [
                'nama' => 'Cetirizine 10 mg',
                'keterangan' => 'Untuk mengobati alergi',
            ],
            [
                'nama' => 'Cetirizine Syrup',
                'keterangan' => 'Untuk mengobati alergi',
            ],
            [
                'nama' => 'Alprazolam 0.5 mg',
                'keterangan' => 'Untuk mengobati kecemasan',
            ],
            [
                'nama' => 'Alprazolam 1 mg',
                'keterangan' => 'Untuk mengobati kecemasan',
            ],
            [
                'nama' => 'Diazepam 2 mg',
                'keterangan' => 'Untuk mengobati kecemasan',
            ],
            [
                'nama' => 'Phenobarbital 30 mg tablet',
                'keterangan' => 'Untuk mengobati kecemasan',
            ],
            [
                'nama' => 'Gentamycin 0.1%',
                'keterangan' => 'Untuk mengobati infeksi kulit',
            ],
            [
                'nama' => 'Amoxicillin 500 mg',
                'keterangan' => 'Untuk mengobati infeksi saluran pernafasan, saluran kemih, dan infeksi kuping',
            ],
            [
                'nama' => 'Meropenem Injeksi Kering 1 gr',
                'keterangan' => 'Untuk mengobati infeksi saluran pernafasan, saluran kemih, dan infeksi kuping',
            ],
            [
                'nama' => 'Cefadroxil 500 mg',
                'keterangan' => 'Untuk mengobati infeksi saluran kemih, kulit, pernafasan, dan tenggorokan',
            ],
            [
                'nama' => 'Cefixime 100 mg',
                'keterangan' => 'Untuk mengobati infeksi saluran kemih, kulit, pernafasan, dan tenggorokan',
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
            ],
        ]);

        $this->db->table('stok')->insertBatch([
            [
                'obat_id' => 1,
                'kemasan_id' => 1,
                'jumlah' => 1,
                'kedarluwarsa' => '2024-01-02',
                'beli' => 10000,
                'jual' => 15000,
            ],
            [
                'obat_id' => 2,
                'kemasan_id' => 2,
                'jumlah' => 2,
                'kedarluwarsa' => '2024-02-03',
                'beli' => 20000,
                'jual' => 25000,
            ],
            [
                'obat_id' => 3,
                'kemasan_id' => 1,
                'jumlah' => 3,
                'kedarluwarsa' => '2024-03-04',
                'beli' => 30000,
                'jual' => 35000,
            ],
            [
                'obat_id' => 4,
                'kemasan_id' => 3,
                'jumlah' => 4,
                'kedarluwarsa' => '2024-04-05',
                'beli' => 40000,
                'jual' => 45000,
            ],
            [
                'obat_id' => 5,
                'kemasan_id' => 4,
                'jumlah' => 5,
                'kedarluwarsa' => '2024-05-06',
                'beli' => 50000,
                'jual' => 55000,
            ],
            [
                'obat_id' => 6,
                'kemasan_id' => 4,
                'jumlah' => 6,
                'kedarluwarsa' => '2024-06-07',
                'beli' => 60000,
                'jual' => 65000,
            ],
            [
                'obat_id' => 7,
                'kemasan_id' => 2,
                'jumlah' => 7,
                'kedarluwarsa' => '2024-07-08',
                'beli' => 70000,
                'jual' => 75000,
            ],
            [
                'obat_id' => 8,
                'kemasan_id' => 1,
                'jumlah' => 8,
                'kedarluwarsa' => '2024-08-09',
                'beli' => 80000,
                'jual' => 85000,
            ],
            [
                'obat_id' => 9,
                'kemasan_id' => 1,
                'jumlah' => 9,
                'kedarluwarsa' => '2024-09-10',
                'beli' => 90000,
                'jual' => 95000,
            ],
            [
                'obat_id' => 10,
                'kemasan_id' => 1,
                'jumlah' => 10,
                'kedarluwarsa' => '2024-10-11',
                'beli' => 100000,
                'jual' => 105000,
            ],
            [
                'obat_id' => 11,
                'kemasan_id' => 5,
                'jumlah' => 11,
                'kedarluwarsa' => '2024-11-12',
                'beli' => 110000,
                'jual' => 115000,
            ],
            [
                'obat_id' => 12,
                'kemasan_id' => 6,
                'jumlah' => 12,
                'kedarluwarsa' => '2024-12-13',
                'beli' => 120000,
                'jual' => 125000,
            ],
            [
                'obat_id' => 13,
                'kemasan_id' => 1,
                'jumlah' => 13,
                'kedarluwarsa' => '2024-12-14',
                'beli' => 130000,
                'jual' => 135000,
            ],
            [
                'obat_id' => 14,
                'kemasan_id' => 7,
                'jumlah' => 14,
                'kedarluwarsa' => '2024-12-15',
                'beli' => 140000,
                'jual' => 145000,
            ],
            [
                'obat_id' => 15,
                'kemasan_id' => 8,
                'jumlah' => 15,
                'kedarluwarsa' => '2024-12-16',
                'beli' => 150000,
                'jual' => 155000,
            ],
            [
                'obat_id' => 16,
                'kemasan_id' => 3,
                'jumlah' => 16,
                'kedarluwarsa' => '2024-12-17',
                'beli' => 160000,
                'jual' => 165000,
            ],
        ]);
    }
}
