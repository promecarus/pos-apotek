<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function signup()
    {
        return view('auth/signup', [
            'title' => 'Sign Up'
        ]);
    }

    public function register()
    {
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $confirm_password = $this->request->getVar('confirm_password');
        $nama = $this->request->getVar('nama');

        if (!$userModel->validate($this->request->getPost()) || $password != $confirm_password) {
            $errors = $userModel->errors();

            if ($password != $confirm_password) {
                $errors['confirm_password'] = 'Konfirmasi password tidak sesuai';
            }

            return redirect()
                ->to(base_url('auth/signup'))
                ->withInput()
                ->with('errors', $errors)
                ->with('message_error', 'Registrasi gagal. Silakan coba lagi!');
        } else {
            $userModel->insert([
                'email' => $email,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'nama' => $nama
            ]);
            return redirect()->to(base_url('auth/signin'))->with('message_success', 'Registrasi berhasil. Silakan login!');
        }
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
