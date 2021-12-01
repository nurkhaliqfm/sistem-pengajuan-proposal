<?php

namespace App\Controllers;

use App\Models\PenyuluhModel;
use App\Models\AdminModel;
use App\Models\UsersModel;
use App\Models\ProposalModel;
use App\Models\MemberModel;

class Admin extends BaseController
{
    protected $penyuluhModel;
    protected $adminModel;
    protected $usersModel;
    protected $proposalModel;
    protected $memberModel;
    public function __construct()
    {
        $this->penyuluhModel = new PenyuluhModel();
        $this->adminModel = new AdminModel();
        $this->usersModel = new UsersModel();
        $this->proposalModel = new ProposalModel();
        $this->memberModel = new MemberModel();
    }

    public function index()
    {
        if (session()->get('user_level') != 'admin') {
            return redirect()->to(base_url('home/error_404'));
        }

        $nik = session()->get('nik');
        $admin = $this->adminModel->where(['nik' => $nik])->first();
        $data = [
            'title' => 'Dashboard | Dinas Pertanian Luwu Timur',
            'admin_name' => $admin['full_name']
        ];
        return view('admin/dashboard', $data);
    }

    public function kelola_pengguna($filter_value = 'p')
    {

        if (session()->get('user_level') != 'admin') {
            return redirect()->to(base_url('home/error_404'));
        }
        // else if (session()->get('user_level') != 'SuperAdmin') {
        // return redirect()->to(base_url('admin/error_404'));
        // }

        $nik = session()->get('nik');
        $admin = $this->adminModel->where(['nik' => $nik])->first();
        $penyuluh = $this->penyuluhModel->findAll();
        $data_admin = $this->adminModel->findAll();

        if ($filter_value == "a") {
            $data = [
                'title' => 'Kelola Pengguna | Dinas Pertanian Luwu Timur',
                'header' => 'Kelola Pengguna',
                'data_user' => $data_admin,
                'admin_name' => $admin['full_name']
            ];
        } else {
            $data = [
                'title' => 'Kelola Pengguna | Dinas Pertanian Luwu Timur',
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
            'title' => 'Proposal Masuk | Dinas Pertanian Luwu Timur',
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
            'title' => 'Proposal Disetujui | Dinas Pertanian Luwu Timur',
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
            'title' => 'Proposal Ditolak | Dinas Pertanian Luwu Timur',
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
            'title' => 'Detail Pengguna | Dinas Pertanian Luwu Timur',
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
            'title' => 'Detail | Dinas Pertanian Luwu Timur',
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
            'title' => 'Respon | Dinas Pertanian Luwu Timur',
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

    public function penyuluh()
    {
        $current_page = $this->request->getVar('page_member') ? $this->request->getVar('page_member') : 1;

        if (session()->get('user_level') != 'admin') {
            return redirect()->to(base_url('home/error_404'));
        }

        $keyword = $this->request->getVar('keyword');
        $district = $this->request->getVar('inputStatus');
        if ($keyword) {
            if ($district == null) {
                $member = $this->memberModel->search($keyword);
            } else {
                $member = $this->memberModel->where(['district' => $district])->search($keyword);
            }
        } else {
            if ($district) {
                $member = $this->memberModel->where(['district' => $district]);
            } else {
                $member = $this->memberModel;
            }
        }

        $nik = session()->get('nik');
        $admin = $this->adminModel->where(['nik' => $nik])->first();
        $data = [
            'title' => 'Daftar Penyuluh | Dinas Pertanian Luwu Timur',
            'header' => 'Daftar Penyuluh Luwu Timur',
            'admin_name' => $admin['full_name'],
            'member' => $member->paginate(10, 'member'),
            'pager' => $member->pager,
            'current_page' => $current_page,
            'keyword' => $keyword,
            'selected' => $district
        ];

        return view('admin/penyuluh/penyuluh', $data);
    }

    public function create()
    {
        if (session()->get('user_level') != 'admin') {
            return redirect()->to(base_url('home/error_404'));
        }

        $nik = session()->get('nik');
        $admin = $this->adminModel->where(['nik' => $nik])->first();
        $data = [
            'title' => 'Add Penyuluh  | Dinas Pertanian Luwu Timur',
            'header' => 'Menambahkan Anggota Penyuluh',
            'validation' => \Config\Services::validation(),
            'admin_name' => $admin['full_name']

        ];

        return view('admin/penyuluh/add_penyuluh', $data);
    }

    public function send()
    {
        if (session()->get('user_level') != 'admin') {
            return redirect()->to(base_url('home/error_404'));
        }

        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Penyuluh Harus Diisi'
                ]
            ],
            'nik' => [
                'rules' => 'required|is_unique[member.nik]|is_natural_no_zero',
                'errors' => [
                    'required' => 'NIK Harus Diisi',
                    'is_unique' => 'NIK Ini Telah Terdaftar',
                    'is_natural_no_zero' => 'Data Yang Anda Input Tidak Sesuai'
                ]
            ],
            'team' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kelompok Tani Harus Diisi',
                ]
            ],
            'district' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kecamatan Kelompok Tani Harus Diisi'
                ]
            ],
            'village' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Desa Kelompok Tani Harus Diisi',
                ]
            ],
            'type' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Tanaman Harus Diisi',
                ]
            ],
            'size' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Luas Lahan Harus Diisi',
                    'decimal' => 'Data Yang Anda Input Tidak Sesuai'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/admin/penyuluh/create'))->withInput();
        }

        $member = $this->memberModel;
        $member->save([
            'nik' => $this->request->getVar('nik'),
            'name' => $this->request->getVar('name'),
            'team' => $this->request->getVar('team'),
            'village' => $this->request->getVar('village'),
            'district' => $this->request->getVar('district'),
            'size' => $this->request->getVar('size'),
            'type' => $this->request->getVar('type'),
        ]);

        session()->setFlashdata('success', "Penyuluh Berhasil Ditambahkan.");
        return redirect()->to(base_url('admin/penyuluh'));
    }

    public function error_404()
    {
        return view('errors/html/error_404');
    }
}
