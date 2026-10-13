<?php

namespace App\Controllers;

class Pegawai extends BaseController
{
    public function index(): string
    {
        return view('pegawai_view');
    }
}