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
        return view('login');
    }

    public function auth()
    {
        $users = $this->usersModel;
        $cek = $users->where(['nik' => $this->request->getPost('nik')])->findAll();
        if ($cek) {
            $cek_password = $users->where(['password' => $this->request->getVar('password')])->findAll();
            if ($cek_password) {
                session()->set([
                    'nik' => $this->request->getPost('nik'),
                    'password' => $this->request->getVar('password'),
                    'logged_in' => true
                ]);
                return redirect()->to(base_url('pages'));
            } else {
                session()->setFlashdata('pesan', 'Salah Password');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('pesan', 'Username atau Password salah');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
