<?php

namespace App\Controllers;

use App\Models\PenyuluhModel;
use App\Models\AdminModel;
use App\Models\UsersModel;
use App\Models\ProposalModel;

class Admin extends BaseController
{
    protected $penyuluhModel;
    protected $adminModel;
    protected $usersModel;
    protected $proposalModel;
    public function __construct()
    {
        $this->penyuluhModel = new PenyuluhModel();
        $this->adminModel = new AdminModel();
        $this->usersModel = new UsersModel();
        $this->proposalModel = new ProposalModel();
    }

    public function index()
    {
        if (session()->get('user_level') != 'admin') {
            return redirect()->to(base_url('home/error_404'));
        }

        $nik = session()->get('nik');
        $admin = $this->adminModel->where(['nik' => $nik])->first();
        $data = [
            'title' => 'Dashboard | CodeBreak',
            'admin_name' => $admin['full_name']
        ];
        return view('admin/dashboard', $data);
    }

    public function kelola_pengguna($filter_value = 'p')
    {
        if (session()->get('user_level') != 'admin') {
            return redirect()->to(base_url('home/error_404'));
        }

        $nik = session()->get('nik');
        $admin = $this->adminModel->where(['nik' => $nik])->first();
        $penyuluh = $this->penyuluhModel->findAll();
        $data_admin = $this->adminModel->findAll();

        if ($filter_value == "a") {
            $data = [
                'title' => 'Kelola Pengguna | CodeBreak',
                'header' => 'Kelola Pengguna',
                'data_user' => $data_admin,
                'admin_name' => $admin['full_name']
            ];
        } else {
            $data = [
                'title' => 'Kelola Pengguna | CodeBreak',
                'header' => 'Kelola Pengguna',
                'data_user' => $penyuluh,
                'admin_name' => $admin['full_name']
            ];
        }

        return view('admin/users/kelola-pengguna', $data);
    }

    public function proposal_masuk()
    {
        if (session()->get('user_level') != 'admin') {
            return redirect()->to(base_url('home/error_404'));
        }

        $nik = session()->get('nik');
        $admin = $this->adminModel->where(['nik' => $nik])->first();
        $data_proposal = $this->proposalModel->where(['status' => 'Menunggu'])->findAll();
        $data = [
            'title' => 'Proposal Masuk | CodeBreak',
            'header' => 'Daftar Proposal Yang Masuk',
            'admin_name' => $admin['full_name'],
            'proposal' => $data_proposal
        ];
        return view('admin/proposal/proposal-masuk', $data);
    }

    public function proposal_disetujui()
    {
        if (session()->get('user_level') != 'admin') {
            return redirect()->to(base_url('home/error_404'));
        }

        $nik = session()->get('nik');
        $admin = $this->adminModel->where(['nik' => $nik])->first();
        $data_proposal = $this->proposalModel->where(['status' => 'Disetujui'])->findAll();
        $data = [
            'title' => 'Proposal Disetujui | CodeBreak',
            'header' => 'Daftar Proposal Yang Diterima',
            'admin_name' => $admin['full_name'],
            'proposal' => $data_proposal
        ];
        return view('admin/proposal/proposal-disetujui', $data);
    }

    public function proposal_ditolak()
    {
        if (session()->get('user_level') != 'admin') {
            return redirect()->to(base_url('home/error_404'));
        }

        $nik = session()->get('nik');
        $admin = $this->adminModel->where(['nik' => $nik])->first();
        $data_proposal = $this->proposalModel->where(['status' => 'Ditolak'])->findAll();
        $data = [
            'title' => 'Proposal Ditolak | CodeBreak',
            'header' => 'Daftar Proposal Yang Ditolak',
            'admin_name' => $admin['full_name'],
            'proposal' => $data_proposal
        ];
        return view('admin/proposal/proposal-ditolak', $data);
    }

    public function detail_user($slug)
    {
        $nik = session()->get('nik');
        $admin = $this->adminModel->where(['nik' => $nik])->first();
        $d_penyuluh = $this->penyuluhModel->where(['slug' => $slug])->first();
        $d_admin = $this->adminModel->where(['slug' => $slug])->first();
        if ($d_admin == null) {
            $data_user = $d_penyuluh;
        } else {
            $data_user = $d_admin;
        }

        if (session()->get('user_level') != 'admin') {
            return redirect()->to(base_url('home/error_404'));
        } elseif ($data_user == null) {
            return redirect()->to(base_url('admin/error_404'));
        }

        $data = [
            'title' => 'Detail Pengguna | CodeBreak',
            'header' => 'Biodata Pengguna',
            'admin_name' => $admin['full_name'],
            'penyuluh' => $data_user
        ];
        return view('admin/users/detail-user', $data);
    }

    public function detail_proposal($slug)
    {
        $nik = session()->get('nik');
        $admin = $this->adminModel->where(['nik' => $nik])->first();
        $data_proposal = $this->proposalModel->where(['slug' => $slug])->first();

        if (session()->get('user_level') != 'admin') {
            return redirect()->to(base_url('home/error_404'));
        } elseif ($data_proposal == null) {
            return redirect()->to(base_url('admin/error_404'));
        }

        $data = [
            'title' => 'Detail | CodeBreak',
            'header' => 'Detail Proposal',
            'admin_name' => $admin['full_name'],
            'proposal' => $data_proposal
        ];
        return view('/admin/proposal/detail_proposal', $data);
    }

    public function delete($id)
    {
        if (session()->get('user_level') != 'admin') {
            return redirect()->to(base_url('home/error_404'));
        }

        $file_book = $this->proposalModel->where(['id' => $id])->first();

        unlink('upload/document/' . $file_book['document']);

        $this->proposalModel->delete($id);
        session()->setFlashdata('deleted', "Pengajuan Proposal Telah Dihapus Dan Dibatalkan.");
        return redirect()->to('/home/proposal');
    }

    public function respon($slug)
    {
        $nik = session()->get('nik');
        $admin = $this->adminModel->where(['nik' => $nik])->first();
        $data_proposal = $this->proposalModel->where(['slug' => $slug])->first();

        if (session()->get('user_level') != 'admin') {
            return redirect()->to(base_url('home/error_404'));
        } elseif ($data_proposal == null) {
            return redirect()->to(base_url('admin/error_404'));
        }

        $data = [
            'title' => 'Respon | CodeBreak',
            'header' => 'Respon Proposal',
            'admin_name' => $admin['full_name'],
            'validation' => \Config\Services::validation(),
            'proposal' => $data_proposal
        ];
        return view('/admin/proposal/respon_proposal', $data);
    }

    public function update($id)
    {
        if (session()->get('user_level') != 'admin') {
            return redirect()->to(base_url('home/error_404'));
        }

        if (!$this->validate([
            'inputStatus' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Proposal harus Dipilih'
                ]
            ],
            'note' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Catatan Proposal Harus Diisi',
                ]
            ]
        ])) {
            return redirect()->to('admin/respon/' . $this->request->getVar('slug'))->withInput();
        }

        if ($this->request->getVar('inputStatus') == 'Tolak') {
            $status = 'Ditolak';
        } else {
            $status = 'Disetujui';
        }

        $proposal = $this->proposalModel;
        $proposal->save([
            'id' => $id,
            'status' => $status,
            'note' => $this->request->getVar('note')
        ]);

        session()->setFlashdata('success', "Proposal Telah Direspon.");
        return redirect()->to(base_url('admin/proposal_masuk'));
    }

    public function error_404()
    {
        return view('errors/html/error_404');
    }
}
