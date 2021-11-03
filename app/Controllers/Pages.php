<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('pages/dashboard');
    }

    public function kelola_pengguna()
    {
        return view('pages/kelola-pengguna');
    }

    public function data_pegawai()
    {
        return view('pages/data-pegawai');
    }

    public function level_pengguna()
    {
        return view('pages/level-pengguna');
    }
}
