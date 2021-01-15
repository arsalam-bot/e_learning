<?php

namespace App\Controllers;

use App\Models\M_Kelasonline;
use App\Models\M_Guru;
use App\Models\M_Mapel;
use App\Models\M_Kelas;
 
class Kelasonline extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->M_Kelasonline = new M_Kelasonline();
        $this->M_Guru = new M_Guru();
        $this->M_Mapel = new M_Mapel();
        $this->M_Kelas = new M_Kelas();
    }
    public function index()
    {
        $data = [
            'judul' => 'Data Kelas Online',
            'kelasonline' => $this->M_Kelasonline->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('kelasonline/index');
        echo view('templates/v_footer');
    }
    public function kindex()
    {
        $data = [
            'judul' => 'Data Kelas Online',
            'kelasonline' => $this->M_Kelasonline->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('kelasonline/kindex');
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Data Kelas Online',
            'guru' => $this->M_Guru->loadData(),
            'mapel' => $this->M_Mapel->loadData(),
            'kelas' => $this->M_Kelas->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('kelasonline/tambah');
        echo view('templates/v_footer');
    }

    public function tambahkelasonline()
    {
        if ($this->validate([
            'id_guru' => [
                'label' => 'Nama Guru Tidak Boleh Kosong',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'id_mapel' => [
                'label' => 'Nama Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'id_kelas' => [
                'label' => 'Kelas Tidak Boleh Kosong',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'fotokelasonline' => [
                'label' => 'Foto Kelas Online',
                'rules' => 'uploaded[fotokelasonline]|max_size[fotokelasonline,4096]|mime_in[fotokelasonline,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} tidak boleh kosong.',
                    'max_size' => '{field} max 4Mb.',
                    'mime_in' => '{field} hanya boleh .PNG, .JPG, .JPEG.',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('fotokelasonline');
            $nama_file = $foto->getClientName();
            $data = [
                'id_guru' => $this->request->getPost('id_guru'),
                'id_mapel' => $this->request->getPost('id_mapel'),
                'id_kelas' => $this->request->getPost('id_kelas'),
                'fotokelasonline' => $nama_file,
            ];
            $foto->move('foto kelas', $nama_file);
            $this->M_Kelasonline->tambah($data);
            session()->setFlashdata('message', 'Di Tambahkan');
            return redirect()->to(base_url('kelasonline'));
        } else {
            session()->setFlashData('validationguruerror', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('kelasonline/tambah'))->withInput();
        }
    }

    public function hapus($id)
    {
        $data = [
            'id_kelasonline' => $id
        ];
        $this->M_Kelasonline->hapus($data);
        session()->setFlashdata('message', 'Di Hapus');
        return redirect()->to(base_url('kelasonline'));
    }
}
