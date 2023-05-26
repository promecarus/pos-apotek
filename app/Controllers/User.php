<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
    }

    public function index()
    {
        return view('master/user', [
            'title' => 'User',
            'bodyClass' => 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed',
            'fields' => [
                'id', 'email', 'username', 'password', 'nama', 'role_id',
            ],
            'rules' => '{
                email: {
                    required: true,
                    email: true,
                    maxlength: 255,
                },
                username: {
                    required: true,
                    minlength: 2,
                    maxlength: 255,
                },
                password: {
                    minlength: 6,
                    maxlength: 255
                },
                nama: {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                },
                role_id: {
                    required: true
                }
            }',
            'messages' => '{
                email: {
                    required: "Email tidak boleh kosong",
                    email: "Email tidak valid",
                    maxlength: "Email maksimal 255 karakter"
                },
                username: {
                    required: "Username tidak boleh kosong",
                    minlength: "Username minimal 2 karakter",
                    maxlength: "Username maksimal 255 karakter",
                },
                password: {
                    required: "Password tidak boleh kosong",
                    minlength: "Password minimal 6 karakter",
                    maxlength: "Password maksimal 255 karakter"
                },
                nama: {
                    required: "Nama tidak boleh kosong",
                    minlength: "Nama minimal 2 karakter",
                    maxlength: "Nama maksimal 255 karakter"
                },
            }',
            'dataTable' => $this->userModel->getUser(),
            'role' => (new \App\Models\RoleModel())
                ->select('id, role')
                ->where('deleted_at', null)
                ->get()->getResultArray()
        ]);
    }

    public function update($id)
    {
        $data = [
            'nama' => $this->request->getVar('nama'),
            'role_id' => $this->request->getVar('role_id'),
        ];

        if ($this->request->getVar('email') != $this->userModel->find($id)['email']) {
            $data['email'] = $this->request->getVar('email');
        }

        if ($this->request->getVar('username') != $this->userModel->find($id)['username']) {
            $data['username'] = $this->request->getVar('username');
        }

        if ($this->request->getVar('password')) {
            $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $data);
        return redirect()
            ->back()
            ->with('message', 'Data berhasil diupdate, sign in ulang untuk melihat perubahan')
            ->with('type', 'success');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus')
            ->with('type', 'success');
    }
}
