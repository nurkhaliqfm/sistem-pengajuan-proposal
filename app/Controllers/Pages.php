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
}
