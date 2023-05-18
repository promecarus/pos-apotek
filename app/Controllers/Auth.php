<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function signup()
    {
        return view("auth/signup", [
            "title" => "Sign Up",
            "bodyClass" => "hold-transition register-page",
            "rules" => "{
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: '/auth/checkEmailUnique',
                        type: 'post',
                        data: {email: function() {return $('#email').val()}}
                    }
                },
                username: {
                    required: true,
                    minlength: 2,
                    maxlength: 255,
                    remote: {
                        url: '/auth/checkUsernameUnique',
                        type: 'post',
                        data: {username: function() {return $('#username').val()}}
                    }
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 255
                },
                confirm_password: {
                    required: true,
                    equalTo: '#password'
                },
                nama: {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                }
            }",
            "messages" => "{
                email: {
                    required: 'Email tidak boleh kosong',
                    email: 'Email tidak valid',
                    remote: 'Email sudah terdaftar'
                },
                username: {
                    required: 'Username tidak boleh kosong',
                    minlength: 'Username minimal 2 karakter',
                    maxlength: 'Username maksimal 255 karakter',
                    remote: 'Username sudah terdaftar'
                },
                password: {
                    required: 'Password tidak boleh kosong',
                    minlength: 'Password minimal 6 karakter',
                    maxlength: 'Password maksimal 255 karakter'
                },
                confirm_password: {
                    required: 'Konfirmasi password tidak boleh kosong',
                    equalTo: 'Konfirmasi password tidak sesuai dengan password'
                },
                nama: {
                    required: 'Nama tidak boleh kosong',
                    minlength: 'Nama minimal 2 karakter',
                    maxlength: 'Nama maksimal 255 karakter'
                }
            }"
        ]);
    }

    public function checkEmailUnique()
    {
        return $this->response->setJSON(
            (new UserModel())->where('email', $this->request->getVar('email'))->first()
                ? false
                : true
        );
    }

    public function checkUsernameUnique()
    {
        return $this->response->setJSON(
            (new UserModel())->where('username', $this->request->getVar('username'))->first()
                ? false
                : true
        );
    }

    public function register()
    {
        $userModel = new UserModel();
        $email = $this->request->getVar("email");
        $username = $this->request->getVar("username");
        $password = $this->request->getVar("password");
        $nama = $this->request->getVar("nama");

        if (empty($email) || empty($username) || empty($password) || empty($nama)) {
            return redirect()
                ->to(base_url("auth/signup"))
                ->withInput()
                ->with("message", "Harap isi semua field.")
                ->with("type", "error");
        }

        $userModel->insert([
            "email" => $email,
            "username" => $username,
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "nama" => $nama
        ]);

        return redirect()
            ->to(base_url("auth/signin"))
            ->with("message", "Registrasi berhasil, silakan login!")
            ->with("type", "success");
    }

    public function signin()
    {
        return view('auth/signin', [
            'title' => 'Sign In'
        ]);
    }

    public function login()
    {
        $userModel = new UserModel();
        $emailOrUsername = $this->request->getVar('emailOrUsername');
        $user = $userModel
            ->where('email', $emailOrUsername)
            ->orWhere('username', $emailOrUsername)
            ->first();

        if (!$user || !password_verify($this->request->getVar('password'), $user['password'])) {
            return redirect()
                ->to(base_url('auth/signin'))
                ->withInput()
                ->with('message_error', 'Login gagal. Silakan coba lagi!');
        }

        session()->set([
            'nama' => $user['nama'],
            'username' => $user['username'],
            'role_id' => $user['role_id'],
            'logged_in' => true
        ]);

        return redirect()
            ->to(base_url())
            ->with('message_success', 'Selamat datang, ' . $user['nama'] . '.');
    }

    public function signout()
    {
        session()->destroy();
        return redirect()
            ->to(base_url('auth/signin'))
            ->with('message_success', 'Logout berhasil. Sampai jumpa lagi!');
    }
}
