<?php

namespace App\Controllers;

use App\Models\M_Kelas;

class Kelas extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->M_Kelas = new M_Kelas();
    }
    public function index()
    {
        $data = [
            'judul' => 'Data Kelas',
            'kelas' => $this->M_Kelas->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('kelas/index');
        echo view('templates/v_footer');
    }
    public function kindex()
    {
        $data = [
            'judul' => 'Data Kelas',
            'kelas' => $this->M_Kelas->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('kelas/kindex');
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Data Kelas',
            'kelas' => $this->M_Kelas->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('kelas/tambah');
        echo view('templates/v_footer');
    }

    public function tambahkelas()
    {
        if ($this->validate([
            'kelas' => [
                'label' => 'Nama Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
        ])) {
            $data = [
                'kelas' => $this->request->getPost('kelas'),
            ];
            $this->M_Kelas->tambah($data);
            session()->setFlashdata('message', 'Di Tambahkan');
            return redirect()->to(base_url('kelas'));
        } else {
            session()->setFlashData('validationguruerror', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('kelas/tambah'))->withInput();
        }
    }

    public function edit($id)
    {
        $data = [
            'judul' => 'Data Kelas',
            'kelas' => $this->M_Kelas->detailData($id),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('kelas/edit');
        echo view('templates/v_footer');
    }

    public function editkelas($id)
    {
        if ($this->validate([
            'kelas' => [
                'label' => 'Nama Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
        ])) {
            $data = [
                'id_kelas' => $id,
                'kelas' => $this->request->getPost('kelas')
            ];
            $this->M_Kelas->edit($data);
            session()->setFlashdata('message', 'Di Ubah');
            return redirect()->to(base_url('kelas'));
        } else {
            session()->setFlashData('validationguruerror', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('kelas/edit'))->withInput();
        }
    }

    public function hapus($id)
    {
        $data = [
            'id_kelas' => $id
        ];
        $this->M_Kelas->hapus($data);
        session()->setFlashdata('message', 'Di Hapus');
        return redirect()->to(base_url('kelas'));
    }
}
