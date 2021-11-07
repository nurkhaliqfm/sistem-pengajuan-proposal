<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
    protected $usersModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        if (session()->get('user_level') == 'admin') {
            return redirect()->to(base_url('admin'));
        } elseif (session()->get('user_level') == 'penyuluh') {
            return redirect()->to(base_url('home'));
        }
        return view('login');
    }

    public function auth()
    {
        $users = $this->usersModel;
        $cek = $users->where(['nik' => $this->request->getVar('nik')])->first();
        if ($cek) {
            $user_level = $cek['level_user'];
            $cek_password = $users->where(['nik' => $cek['nik'], 'password' => $this->request->getVar('password')])->first();
            if ($cek_password) {
                session()->set([
                    'nik' => $this->request->getVar('nik'),
                    'password' => $this->request->getVar('password'),
                    'logged_in' => true,
                    'user_level' => $user_level
                ]);
                if ($user_level == 'penyuluh') {
                    return redirect()->to(base_url('home'));
                }
                return redirect()->to(base_url('admin'));
            } else {
                session()->setFlashdata('wrong_pass', 'Password Anda Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('user_or_pass', 'NIK atau Password Anda Salah');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
