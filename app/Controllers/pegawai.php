<?php

namespace App\Controllers;

class Pegawai extends BaseController
{
    protected $model;
    function __construct()
    {
        $this->model = new \App\Models\ModelPegawai();
    }
    public function index(): string
    {
        return view('pegawai_view');
    }
}