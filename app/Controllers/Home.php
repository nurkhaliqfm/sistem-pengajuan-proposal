<?php

namespace App\Controllers;

use App\Models\ProposalModel;
use App\Models\PenyuluhModel;

class Home extends BaseController
{
    protected $proposalModel;
    protected $penyuluhModel;
    public function __construct()
    {
        $this->proposalModel = new ProposalModel();
        $this->penyuluhModel = new PenyuluhModel();
    }

    public function index()
    {
        if (session()->get('user_level') == 'admin') {
            return redirect()->to(base_url('admin/error_404'));
        }

        $nik = session()->get('nik');
        $penyuluh = $this->penyuluhModel->where(['nik' => $nik])->first();
        $data = [
            'title' => 'Dashboard | CodeBreak',
            'header' => 'Dashboard',
            'penyuluh_name' => $penyuluh['full_name']
        ];
        return view('home/index', $data);
    }

    public function profile()
    {
        if (session()->get('user_level') == 'admin') {
            return redirect()->to(base_url('admin/error_404'));
        }

        $nik = session()->get('nik');
        $penyuluh = $this->penyuluhModel->where(['nik' => $nik])->first();

        $nik = session()->get('nik');
        $penyuluh = $this->penyuluhModel->where(['nik' => $nik])->first();
        $data = [
            'title' => 'Profile | CodeBreak',
            'header' => 'Profile',
            'penyuluh_name' => $penyuluh['full_name'],
            'penyuluh' => $penyuluh
        ];

        return view('home/profile', $data);
    }

    public function proposal()
    {
        if (session()->get('user_level') == 'admin') {
            return redirect()->to(base_url('admin/error_404'));
        }

        $nik = session()->get('nik');
        $penyuluh = $this->penyuluhModel->where(['nik' => $nik])->first();
        $data_proposal = $this->proposalModel->where(['account' => $penyuluh['full_name']])->findAll();
        $data = [
            'title' => 'Proposal | CodeBreak',
            'header' => 'Daftar Proposal',
            'penyuluh_name' => $penyuluh['full_name'],
            'proposal' => $data_proposal
        ];

        return view('home/proposal', $data);
    }

    public function create()
    {
        if (session()->get('user_level') == 'admin') {
            return redirect()->to(base_url('admin/error_404'));
        }

        $nik = session()->get('nik');
        $penyuluh = $this->penyuluhModel->where(['nik' => $nik])->first();
        $data = [
            'title' => 'Proposal  | CodeBreak',
            'header' => 'Mengusulkan Proposal',
            'validation' => \Config\Services::validation(),
            'penyuluh_name' => $penyuluh['full_name']

        ];

        return view('home/add_proposal', $data);
    }

    public function send()
    {
        if (session()->get('user_level') == 'admin') {
            return redirect()->to(base_url('admin/error_404'));
        }

        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Penanggun Jawab Harus Diisi'
                ]
            ],
            'title' => [
                'rules' => 'required|is_unique[proposal.project]',
                'errors' => [
                    'required' => 'Judul Proposal Harus Diisi',
                    'is_unique' => 'Proposal Ini Telah Diajukan',
                ]
            ],
            'description' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Deskripsi Proposal Harus Diisi',
                    'min_length' => 'Deskripsi Yang Anda Masukkan Terlalu Pendek'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi'
                ]
            ],
            'team' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kelompok Tani Harus Diisi',
                ]
            ],
            'fileupload' => [
                'rules' => 'uploaded[fileupload]|max_size[fileupload,5120]|ext_in[fileupload,pdf]|mime_in[fileupload,application/pdf,application/force-download,application/x-download]',
                'errors' => [
                    'uploaded' => 'File Yang Diupload Tidak Sesuai',
                    'max_size' => 'Ukuran File Maximal 5 mb',
                    'ext_in' => 'File Yang Diupload Harus pdf',
                    'mime_in' => 'File Yang Diupload Harus pdf'
                ]
            ]
        ])) {
            return redirect()->to(base_url('/home/create'))->withInput();
        }

        $fileupload = $this->request->getFile('fileupload');
        $fileupload->move('upload/document');
        $fileupload_name = $fileupload->getName();

        $nik = session()->get('nik');
        $proposal = $this->proposalModel;
        $penyuluh = $this->penyuluhModel->where(['nik' => $nik])->first();
        $slug = url_title($this->request->getVar('title'), '-', true);
        $proposal->save([
            'account' => $penyuluh['full_name'],
            'username' => $this->request->getVar('name'),
            'project' => $this->request->getVar('title'),
            'slug' => $slug,
            'description' => $this->request->getVar('description'),
            'address' => $this->request->getVar('address'),
            'document' => $fileupload_name,
            'team' => $this->request->getVar('team'),
            'status' => 'Menunggu',
            'send_time' => date('d F Y')
        ]);

        session()->setFlashdata('success', "Proposal Anda Telah Berhasil Dikirim.");
        return redirect()->to(base_url('home/proposal'));
    }

    public function detail($slug)
    {
        $nik = session()->get('nik');
        $penyuluh = $this->penyuluhModel->where(['nik' => $nik])->first();
        $data_proposal = $this->proposalModel->where(['slug' => $slug])->first();

        if (session()->get('user_level') == 'admin') {
            return redirect()->to(base_url('admin/error_404'));
        } elseif ($data_proposal == null) {
            return redirect()->to(base_url('home/error_404'));
        } elseif ($data_proposal['account'] != $penyuluh['full_name']) {
            return redirect()->to(base_url('home/error_404'));
        }

        $data = [
            'title' => 'Detail | CodeBreak',
            'header' => 'Detail Proposal',
            'penyuluh_name' => $penyuluh['full_name'],
            'proposal' => $data_proposal
        ];
        return view('/home/detail_proposal', $data);
    }

    public function delete($id)
    {
        $nik = session()->get('nik');
        $penyuluh = $this->penyuluhModel->where(['nik' => $nik])->first();
        $file_book = $this->proposalModel->where(['id' => $id])->first();

        if (session()->get('user_level') == 'admin') {
            return redirect()->to(base_url('admin/error_404'));
        } elseif ($file_book == null) {
            return redirect()->to(base_url('home/error_404'));
        } elseif ($file_book['account'] != $penyuluh['full_name']) {
            return redirect()->to(base_url('home/error_404'));
        }

        unlink('upload/document/' . $file_book['document']);

        $this->proposalModel->delete($id);
        session()->setFlashdata('deleted', "Pengajuan Proposal Telah Dihapus Dan Dibatalkan.");
        return redirect()->to('/home/proposal');
    }

    public function edit($slug)
    {
        $nik = session()->get('nik');
        $penyuluh = $this->penyuluhModel->where(['nik' => $nik])->first();
        $data_proposal = $this->proposalModel->where(['slug' => $slug])->first();
        if (session()->get('user_level') == 'admin') {
            return redirect()->to(base_url('admin/error_404'));
        } elseif ($data_proposal == null) {
            return redirect()->to(base_url('home/error_404'));
        } elseif ($data_proposal['account'] != $penyuluh['full_name']) {
            return redirect()->to(base_url('home/error_404'));
        }


        $data = [
            'title' => 'Edit | CodeBreak',
            'header' => 'Edit Proposal',
            'penyuluh_name' => $penyuluh['full_name'],
            'validation' => \Config\Services::validation(),
            'proposal' => $data_proposal
        ];
        return view('/home/edit_proposal', $data);
    }

    public function update($id)
    {
        if (session()->get('user_level') == 'admin') {
            return redirect()->to(base_url('admin/error_404'));
        }

        $old_title = $this->proposalModel->where(['slug' => $this->request->getVar('slug')])->first();
        if ($old_title['project'] == $this->request->getVar('title')) {
            $uniq_field = 'required';
        } else {
            $uniq_field = 'required|is_unique[proposal.project]';
        }

        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Penanggun Jawab Harus Diisi'
                ]
            ],
            'title' => [
                'rules' => $uniq_field,
                'errors' => [
                    'required' => 'Judul Proposal Harus Diisi',
                    'is_unique' => 'Proposal Ini Telah Diajukan',
                ]
            ],
            'description' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Deskripsi Proposal Harus Diisi',
                    'min_length' => 'Deskripsi Yang Anda Masukkan Terlalu Pendek'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi'
                ]
            ],
            'team' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kelompok Tani Harus Diisi',
                ]
            ],
            'fileupload' => [
                'rules' => 'max_size[fileupload,5120]|ext_in[fileupload,pdf]|mime_in[fileupload,application/pdf,application/force-download,application/x-download]',
                'errors' => [
                    'max_size' => 'Ukuran File Maximal 5 mb',
                    'ext_in' => 'File Yang Diupload Harus pdf',
                    'mime_in' => 'File Yang Diupload Harus pdf'
                ]
            ]
        ])) {
            return redirect()->to('home/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileupload = $this->request->getFile('fileupload');
        $last_document_name = $this->request->getVar('lastDocument');

        if ($fileupload->getError() == 4) {
            $fileupload_name = $last_document_name;
        } else {
            $fileupload->move('upload/document');
            $fileupload_name = $fileupload->getName();
            unlink('upload/document/' . $last_document_name);
        }

        $nik = session()->get('nik');
        $proposal = $this->proposalModel;
        $penyuluh = $this->penyuluhModel->where(['nik' => $nik])->first();
        $slug = url_title($this->request->getVar('title'), '-', true);
        $proposal->save([
            'id' => $id,
            'account' => $penyuluh['full_name'],
            'username' => $this->request->getVar('name'),
            'project' => $this->request->getVar('title'),
            'slug' => $slug,
            'description' => $this->request->getVar('description'),
            'address' => $this->request->getVar('address'),
            'document' => $fileupload_name,
            'team' => $this->request->getVar('team'),
            'status' => 'Menunggu',
            'send_time' => date('d F Y')
        ]);

        session()->setFlashdata('success', "Proposal Anda Telah Berhasil Diubah.");
        return redirect()->to(base_url('home/proposal'));
    }

    public function upload($document_title)
    {
        return redirect()->to(base_url('/upload/document/') . $document_title);
    }

    public function error_404()
    {
        return view('errors/html/error_404');
    }
}
