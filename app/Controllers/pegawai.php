<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPegawai;
use PhpParser\Node\Expr\FuncCall;

class Pegawai extends BaseController
{
    protected $model;
    function __construct()
    {
        $this->model = new \App\Models\ModelPegawai();
    }

    public function simpan() 
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|min_length[5]|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter',
                    'valid_email' => 'Email yang anda masukkan tidak valid'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],
        ];
        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'bidang' => $this->request->getPost('bidang'),
            'alamat' => $this->request->getPost('alamat'),
            ];

            $this->model->save($data);

            $hasil['sukses'] = "Berhasil memasukan data";
            $hasil['error'] = true;
        }else{
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }

        return json_encode($hasil);
    }
    public function index(): string
    {
        return view('pegawai_view');
    }
}