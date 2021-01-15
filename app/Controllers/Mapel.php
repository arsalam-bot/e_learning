<?php

namespace App\Controllers;

use App\Models\M_Mapel;
 
class Mapel extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->M_Mapel = new M_Mapel();
    }
    public function index()
    {
        $data = [
            'judul' => 'Data Mata Pelajaran',
            'mapel' => $this->M_Mapel->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('mapel/index');
        echo view('templates/v_footer');
    }
    public function kindex()
    {
        $data = [
            'judul' => 'Data Mata Pelajaran',
            'mapel' => $this->M_Mapel->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('mapel/kindex');
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Data Mata Pelajaran',
            'mapel' => $this->M_Mapel->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('mapel/tambah');
        echo view('templates/v_footer');
    }

    public function tambahmapel()
    {
        if ($this->validate([
            'nama_mapel' => [
                'label' => 'Nama Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
        ])) {
            $data = [
                'nama_mapel' => $this->request->getPost('nama_mapel'),
            ];
            $this->M_Mapel->tambah($data);
            session()->setFlashdata('message', 'Di Tambahkan');
            return redirect()->to(base_url('mapel'));
        } else {
            session()->setFlashData('validationguruerror', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('mapel/tambah'))->withInput();
        }
    }

    public function edit($id)
    {
        $data = [
            'judul' => 'Data Mata Pelajaran',
            'mapel' => $this->M_Mapel->detailData($id),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('mapel/edit');
        echo view('templates/v_footer');
    }

    public function editmapel($id)
    {
        if ($this->validate([
            'nama_mapel' => [
                'label' => 'Nama Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
        ])) {
            $data = [
                'id_mapel' => $id,
                'nama_mapel' => $this->request->getPost('nama_mapel')
            ];
            $this->M_Mapel->edit($data);
            session()->setFlashdata('message', 'Di Ubah');
            return redirect()->to(base_url('mapel'));
        } else {
            session()->setFlashData('validationguruerror', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('mapel/edit'))->withInput();
        }
    }

    public function hapus($id)
    {
        $data = [
            'id_mapel' => $id
        ];
        $this->M_Mapel->hapus($data);
        session()->setFlashdata('message', 'Di Hapus');
        return redirect()->to(base_url('mapel'));
    }
}
