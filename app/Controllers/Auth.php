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

    public function signupProcess()
    {
        $userModel = new UserModel();
        $email = esc($this->request->getVar("email"));
        $username = $this->request->getVar("username");
        $password = $this->request->getVar("password");
        $nama = esc($this->request->getVar("nama"));

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
            ->with("message", "Sign up berhasil, silakan sign in!")
            ->with("type", "success");
    }

    public function signin()
    {
        return view("auth/signin", [
            "title" => "Sign In",
            "bodyClass" => "hold-transition login-page",
            "rules" => "{
                emailOrUsername: {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                },
                password: {
                    required: true
                }
            }",
            "messages" => "{
                emailOrUsername: {
                    required: 'Email atau username tidak boleh kosong',
                    minlength: 'Username minimal 2 karakter',
                    maxlength: 'Email atau username maksimal 255 karakter'
                },
                password: {
                    required: 'Password tidak boleh kosong'
                }
            }"
        ]);
    }

    public function signinProcess()
    {
        $userModel = new UserModel();
        $emailOrUsername = $this->request->getVar("emailOrUsername");
        $user = $userModel
            ->where("email", $emailOrUsername)
            ->orWhere("username", $emailOrUsername)
            ->first();

        if (!$user || !password_verify($this->request->getVar("password"), $user["password"])) {
            return redirect()
                ->back()
                ->withInput()
                ->with("message", "Sign in gagal, silakan coba lagi!")
                ->with("type", "error");
        }

        session()->set([
            "nama" => $user["nama"],
            "username" => esc($user["username"]),
            "user_id" => $user["id"],
            "role_id" => $user["role_id"],
            "signed_in" => true
        ]);

        return redirect()
            ->to(base_url())
            ->with("message", "Selamat datang, " . $user["nama"] . ".")
            ->with("type", "success");
    }

    public function signout()
    {
        session()->remove(["nama", "username", "role_id", "signed_in"]);
        return redirect()
            ->to(base_url("auth/signin"))
            ->with("message", "Sign out berhasil, sampai jumpa lagi.")
            ->with("type", "success");
    }
}
