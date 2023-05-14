<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $protectFields = true;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $allowedFields = [
        'email',
        'username',
        'password',
        'nama',
        'role_id',
    ];
    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[users.email]',
        'username' => 'required|alpha_numeric_space|min_length[2]|max_length[255]|is_unique[users.username]',
        'password' => 'required|min_length[6]|max_length[255]',
        'nama' => 'required|alpha_space|min_length[2]|max_length[255]',
    ];
    protected $validationMessages = [
        'email' => [
            'required' => 'Email wajib diisi.',
            'valid_email' => 'Email tidak valid.',
            'is_unique' => 'Email sudah terdaftar.',
        ],
        'username' => [
            'required' => 'Username wajib diisi.',
            'alpha_numeric_space' => 'Username hanya boleh berisi huruf, angka, spasi, dan underscore.',
            'min_length' => 'Username minimal terdiri dari 2 karakter.',
            'max_length' => 'Username maksimal terdiri dari 255 karakter.',
            'is_unique' => 'Username sudah terdaftar.',
        ],
        'password' => [
            'required' => 'Password wajib diisi.',
            'min_length' => 'Password minimal terdiri dari 6 karakter.',
            'max_length' => 'Password maksimal terdiri dari 255 karakter.',
        ],
        'nama' => [
            'required' => 'Nama wajib diisi.',
            'alpha_space' => 'Nama hanya boleh berisi huruf dan spasi.',
            'min_length' => 'Nama minimal terdiri dari 2 karakter.',
            'max_length' => 'Nama maksimal terdiri dari 255 karakter.',
        ],
    ];
    protected $skipValidation = false;
}
