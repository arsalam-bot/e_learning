<?php

namespace App\Controllers;

use App\Models\M_Guru;

class Guru extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->M_Guru = new M_Guru();
    }
    public function index()
    {
        $data = [
            'judul' => 'Data Guru',
            'guru' => $this->M_Guru->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('guru/index');
        echo view('templates/v_footer');
    }
    public function kindex()
    {
        $data = [
            'judul' => 'Data Guru',
            'guru' => $this->M_Guru->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('guru/kindex');
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Data Guru',
            'guru' => $this->M_Guru->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('guru/tambah');
        echo view('templates/v_footer');
    }

    public function tambahguru()
    {
        if ($this->validate([
            'nip' => [
                'label' => 'NIP',
                'rules' => 'required|numeric|max_length[20]|is_unique[guru.nip]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'numeric' => '{field} hanya boleh dengan angka.',
                    'max_length' => '{field} maksimal 20 angka.',
                    'is_unique' => '{field} sudah digunakan.',
                ]
            ],

            'nama_guru' => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'tttl' => [
                'label' => 'Tempat Tanggal Tahun Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'jabatan' => [
                'label' => 'Jabatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'pangkatgol' => [
                'label' => 'Pangkat Golongan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'foto' => [
                'label' => 'Foto Guru',
                'rules' => 'uploaded[foto]|max_size[foto,4096]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} tidak boleh kosong.',
                    'max_size' => '{field} max 4Mb.',
                    'mime_in' => '{field} hanya boleh .PNG, .JPG, .JPEG.',
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|max_length[25]|is_unique[guru.username]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'max_length' => '{field} maksimal 25 angka.',
                    'is_unique' => '{field} sudah digunakan.',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|max_length[25]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'max_length' => '{field} maksimal 25 angka.',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getClientName();
            $data = [
                'nip' => $this->request->getPost('nip'),
                'nama_guru' => $this->request->getPost('nama_guru'),
                'tttl' => $this->request->getPost('tttl'),
                'jabatan' => $this->request->getPost('jabatan'),
                'pangkatgol' => $this->request->getPost('pangkatgol'),
                'foto' => $nama_file,
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'level' => 'Guru',
            ];

            $foto->move('foto guru', $nama_file);
            $this->M_Guru->tambah($data);
            session()->setFlashdata('message', 'Di Tambahkan');
            return redirect()->to(base_url('guru'));
        } else {
            session()->setFlashData('validationguruerror', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('guru/tambah'))->withInput();
        }
    }

    public function edit($id)
    {
        $data = [
            'judul' => 'Data Guru',
            'guru' => $this->M_Guru->detailData($id),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('guru/edit');
        echo view('templates/v_footer');
    }

    public function editguru($id)
    {
        if ($this->validate([
            'nip' => [
                'label' => 'NIP',
                'rules' => 'required|numeric|max_length[20]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'numeric' => '{field} hanya boleh dengan angka.',
                    'max_length' => '{field} maksimal 20 angka.',
                ]
            ],

            'nama_guru' => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'tttl' => [
                'label' => 'Tempat Tanggal Tahun Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'jabatan' => [
                'label' => 'Jabatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'pangkatgol' => [
                'label' => 'Pangkat Golongan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'foto' => [
                'label' => 'Foto Guru',
                'rules' => 'max_size[foto,4096]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} tidak boleh kosong.',
                    'max_size' => '{field} max 4Mb.',
                    'mime_in' => '{field} hanya boleh .PNG, .JPG, .JPEG.',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|max_length[25]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'max_length' => '{field} maksimal 25 angka.',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = [
                    'id_guru' => $id,
                    'nip' => $this->request->getPost('nip'),
                    'nama_guru' => $this->request->getPost('nama_guru'),
                    'tttl' => $this->request->getPost('tttl'),
                    'jabatan' => $this->request->getPost('jabatan'),
                    'pangkatgol' => $this->request->getPost('pangkatgol'),
                    'password' => $this->request->getPost('password'),
                ];
                $this->M_Guru->edit($data);
            } else {
                $guru = $this->M_Guru->detailData($id);
                if ($guru['foto'] != "") {
                    unlink('foto guru/' . $guru['foto']);
                }
                $nama_file = $foto->getClientName();
                $data = [
                    'id_guru' => $id,
                    'nip' => $this->request->getPost('nip'),
                    'nama_guru' => $this->request->getPost('nama_guru'),
                    'tttl' => $this->request->getPost('tttl'),
                    'jabatan' => $this->request->getPost('jabatan'),
                    'pangkatgol' => $this->request->getPost('pangkatgol'),
                    'foto' => $nama_file,
                    'password' => $this->request->getPost('password'),
                ];
                $foto->move('foto guru', $nama_file);
                $this->M_Guru->edit($data);
            }
            session()->setFlashdata('message', 'Di Ubah');
            return redirect()->to(base_url('guru'));
        } else {
            session()->setFlashData('validationguruerror', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('guru/edit'))->withInput();
        }
    }

    public function hapus($id)
    {
        $guru = $this->M_Guru->detailData($id);
        if ($guru['foto'] != "") {
            unlink('foto guru/' . $guru['foto']);
        }
        $data = [
            'id_guru' => $id
        ];
        $this->M_Guru->hapus($data);
        session()->setFlashdata('message', 'Di Hapus');
        return redirect()->to(base_url('guru'));
    }
}
