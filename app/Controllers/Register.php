<?php

namespace App\Controllers;

use App\Models\PenyuluhModel;
use App\Models\UsersModel;
use App\Models\MemberModel;

class Register extends BaseController
{
    protected $usersModel;
    protected $penyuluhModel;
    protected $memberModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->penyuluhModel = new PenyuluhModel();
        $this->memberModel = new MemberModel();
    }

    public function index()
    {
        if (session()->get('user_level') == 'admin') {
            return redirect()->to(base_url('admin'));
        } elseif (session()->get('user_level') == 'penyuluh') {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('register', $data);
    }

    public function process()
    {
        if (!$this->validate([
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap Harus Diisi'
                ]
            ],
            'nik' => [
                'rules' => 'required|is_unique[users.nik]|is_natural_no_zero',
                'errors' => [
                    'required' => 'NIK Harus Diisi',
                    'is_unique' => 'NIK Telah Terdaftar',
                    'is_natural_no_zero' => 'Data Yang Anda Input Tidak Sesuai'
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[10]|numeric',
                'errors' => [
                    'required' => 'No. HP Harus Diisi',
                    'min_length' => 'Periksa No. Hp Anda',
                    'numeric' => 'Periksa No. Hp Anda'
                ]
            ],
            'repassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi',
                    'matches' => 'Password Tidak Sesuai',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi',
                    'min_length' => 'Password Minimal 8 Karakter',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('register/index'))->withInput()->with('validation', $validation);
        }

        $member = $this->memberModel;
        $ceknik = $member->where(['nik' => $this->request->getVar('nik')])->first();

        if ($ceknik == null) {
            session()->setFlashdata('Gagal', "Nik Anda Tidak Terdaftar Sebagai Penyuluh.");
            return redirect()->to(base_url('register/index'));
        }

        $users = $this->usersModel;
        $penyuluh = $this->penyuluhModel;
        $slug = url_title($this->request->getVar('fullname'), '-', true);
        $users->save([
            'nik' => $this->request->getVar('nik'),
            'password' => $this->request->getVar('password'),
            'level_user' => 'penyuluh',
            'last_login' => date('Y-m-d H:i:s')
        ]);

        $penyuluh->save([
            'full_name' => $this->request->getVar('fullname'),
            'slug' => $slug,
            'nik' => $this->request->getVar('nik'),
            'status_user' => 'Penyuluh',
            'phone' => $this->request->getVar('phone'),
            'team' => 'Luwu Timur',
            'address' => 'Luwu Timur'
        ]);

        session()->setFlashdata('success', "Akun Berhasil Dibuat.");
        return redirect()->to(base_url('login/index'));
    }
}
