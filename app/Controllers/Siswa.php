<?php

namespace App\Controllers;

use App\Models\M_Siswa;

class Siswa extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->M_Siswa = new M_Siswa();
    }
    public function index()
    {
        $data = [
            'judul' => 'Data Siswa',
            'siswa' => $this->M_Siswa->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('siswa/index');
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Data Siswa',
            'siswa' => $this->M_Siswa->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('siswa/tambah');
        echo view('templates/v_footer');
    }

    public function tambahsiswa()
    {
        if ($this->validate([
            'nisn' => [
                'label' => 'NISN',
                'rules' => 'required|numeric|max_length[20]|is_unique[siswa.nisn]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'numeric' => '{field} hanya boleh dengan angka.',
                    'max_length' => '{field} maksimal 20 angka.',
                    'is_unique' => '{field} sudah digunakan.',
                ]
            ],
            'nama_siswa' => [
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|max_length[25]|is_unique[siswa.username]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'max_length' => '{field} maksimal 25 angka.',
                    'is_unique' => '{field} sudah digunakan.',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'foto' => [
                'label' => 'Foto Siswa',
                'rules' => 'uploaded[foto]|max_size[foto,4096]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} tidak boleh kosong.',
                    'max_size' => '{field} max 4Mb.',
                    'mime_in' => '{field} hanya boleh .PNG, .JPG, .JPEG.',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getClientName();
            $data = [
                'nisn' => $this->request->getPost('nisn'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'tttl' => $this->request->getPost('tttl'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'level' => 'Siswa',
                'foto' => $nama_file,
            ];

            $foto->move('foto siswa', $nama_file);
            $this->M_Siswa->tambah($data);
            session()->setFlashdata('message', 'Di Tambahkan');
            return redirect()->to(base_url('siswa'));
        } else {
            session()->setFlashData('validationguruerror', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('siswa/tambah'))->withInput();
        }
    }

    public function edit($id)
    {
        $data = [
            'judul' => 'Data Siswa',
            'siswa' => $this->M_Siswa->detailData($id),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('siswa/edit');
        echo view('templates/v_footer');
    }

    public function editsiswa($id)
    {
        if ($this->validate([
            'nisn' => [
                'label' => 'NISN',
                'rules' => 'required|numeric|max_length[20]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'numeric' => '{field} hanya boleh dengan angka.',
                    'max_length' => '{field} maksimal 20 angka.',
                ]
            ],
            'nama_siswa' => [
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'foto' => [
                'label' => 'Foto Siswa',
                'rules' => 'max_size[foto,4096]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} tidak boleh kosong.',
                    'max_size' => '{field} max 4Mb.',
                    'mime_in' => '{field} hanya boleh .PNG, .JPG, .JPEG.',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = [
                    'id_siswa' => $id,
                    'nisn' => $this->request->getPost('nisn'),
                    'nama_siswa' => $this->request->getPost('nama_siswa'),
                    'tttl' => $this->request->getPost('tttl'),
                    'password' => $this->request->getPost('password'),
                ];
                $this->M_Siswa->edit($data);
            } else {
                $siswa = $this->M_Siswa->detailData($id);
                if ($siswa['foto'] != "") {
                    unlink('foto siswa/' . $siswa['foto']);
                }
                $nama_file = $foto->getClientName();
                $data = [
                    'id_siswa' => $id,
                    'nisn' => $this->request->getPost('nisn'),
                    'nama_siswa' => $this->request->getPost('nama_siswa'),
                    'tttl' => $this->request->getPost('tttl'),
                    'password' => $this->request->getPost('password'),
                    'foto' => $nama_file,
                ];
                $foto->move('foto siswa', $nama_file);
                $this->M_Siswa->edit($data);
            }
            session()->setFlashdata('message', 'Di Ubah');
            return redirect()->to(base_url('siswa'));
        } else {
            session()->setFlashData('validationguruerror', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('siswa/edit'))->withInput();
        }
    }

    public function hapus($id)
    {
        $siswa = $this->M_Siswa->detailData($id);
        if ($siswa['foto'] != "") {
            unlink('foto siswa/' . $siswa['foto']);
        }
        $data = [
            'id_siswa' => $id
        ];
        $this->M_Siswa->hapus($data);
        session()->setFlashdata('message', 'Di Hapus');
        return redirect()->to(base_url('siswa'));
    }
}
