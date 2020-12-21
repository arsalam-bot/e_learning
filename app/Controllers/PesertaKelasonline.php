<?php

namespace App\Controllers;

use App\Models\M_PesertaKelasonline;
use App\Models\M_Kelasonline;
use App\Models\M_Siswa;

class PesertaKelasonline extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->M_PesertaKelasonline = new M_PesertaKelasonline();
        $this->M_Kelasonline = new M_Kelasonline();
        $this->M_Siswa = new M_Siswa();
    }
    public function index()
    {
        $data = [
            'judul' => 'Data Peserta Kelas Online',
            'pesertakelasonline' => $this->M_PesertaKelasonline->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('pesertakelasonline/index');
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Data Peserta Kelas Online',
            'kelasonline' => $this->M_Kelasonline->loadData(),
            'siswa' => $this->M_Siswa->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('pesertakelasonline/tambah');
        echo view('templates/v_footer');
    }

    public function tambahpesertakelasonline()
    {
        if ($this->validate([
            'id_kelasonline' => [
                'label' => 'Nama Kelas Online Tidak Boleh Kosong',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'id_siswa' => [
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
        ])) {
            $data = [
                'id_kelasonline' => $this->request->getPost('id_kelasonline'),
                'id_siswa' => $this->request->getPost('id_siswa'),
            ];
            $this->M_PesertaKelasonline->tambah($data);
            session()->setFlashdata('message', 'Di Tambahkan');
            return redirect()->to(base_url('pesertakelasonline'));
        } else {
            session()->setFlashData('validationguruerror', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('pesertakelasonline/tambah'))->withInput();
        }
    }

    public function hapus($id)
    {
        $data = [
            'id_pesertakelasonline' => $id
        ];
        $this->M_PesertaKelasonline->hapus($data);
        session()->setFlashdata('message', 'Di Hapus');
        return redirect()->to(base_url('pesertakelasonline'));
    }
}
