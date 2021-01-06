<?php

namespace App\Controllers;

use App\Models\M_Admin;

class Admin extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->M_Admin = new M_Admin();
    }
    public function index()
    {
        $data = [
            'judul' => 'Data Admin',
            'admin' => $this->M_Admin->loadData(),
        ];
        
        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('admin/index');
        echo view('templates/v_footer');
    }
    public function kindex()
    {
        $data = [
            'judul' => 'Data Admin',
            'admin' => $this->M_Admin->loadData(),
        ];
        
        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('admin/kindex');
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Data Admin',
            'admin' => $this->M_Admin->loadData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('admin/tambah');
        echo view('templates/v_footer');
    }

    public function tambahadmin()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|max_length[25]|is_unique[admin.username]',
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
            'nama' => [
                'label' => 'Nama Admin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'foto' => [
                'label' => 'Foto Admin',
                'rules' => 'uploaded[foto]|max_size[foto,4096]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} tidak boleh kosong.',
                    'max_size' => '{field} max 4Mb.',
                    'mime_in' => '{field} hanya boleh .PNG, .JPG, .JPEG.',
                ]
            ],
            'level' => [
                'label' => 'Level Admin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getClientName();
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'nama' => $this->request->getPost('nama'),
                //'level' => 'Admin',
                'level' => $this->request->getPost('level'),
                'foto' => $nama_file,
            ];

            $foto->move('foto', $nama_file);
            $this->M_Admin->tambah($data);
            session()->setFlashdata('message', 'Di Tambahkan');
            return redirect()->to(base_url('admin'));
        } else {
            session()->setFlashData('validationguruerror', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('admin/tambah'))->withInput();
        }
    }

    public function edit($id)
    {
        $data = [
            'judul' => 'Data Admin',
            'admin' => $this->M_Admin->detailData($id),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('admin/edit');
        echo view('templates/v_footer');
    }

    public function editadmin($id)
    {
        if ($this->validate([
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'nama' => [
                'label' => 'Nama Admin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'foto' => [
                'label' => 'Foto Admin',
                'rules' => 'max_size[foto,4096]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} tidak boleh kosong.',
                    'max_size' => '{field} max 4Mb.',
                    'mime_in' => '{field} hanya boleh .PNG, .JPG, .JPEG.',
                ]
            ],
            'level' => [
                'label' => 'Level Admin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = [
                    'id_admin' => $id,
                    'password' => $this->request->getPost('password'),
                    'nama' => $this->request->getPost('nama'),
                    'level' => $this->request->getPost('level'),
                ];
                $this->M_Admin->edit($data);
            } else {
                $admin = $this->M_Admin->detailData($id);
                if ($admin['foto'] != "") {
                    unlink('foto/' . $admin['foto']);
                }
                $nama_file = $foto->getClientName();
                $data = [
                    'id_admin' => $id,
                    'password' => $this->request->getPost('password'),
                    'nama' => $this->request->getPost('nama'),
                    'level' => $this->request->getPost('level'),
                    'foto' => $nama_file,
                ];
                $foto->move('foto', $nama_file);
                $this->M_Admin->edit($data);
            }
            session()->setFlashdata('message', 'Di Ubah');
            return redirect()->to(base_url('admin'));
        } else {
            session()->setFlashData('validationguruerror', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('admin/edit'))->withInput();
        }
    }

    public function hapus($id)
    {
        $admin = $this->M_Admin->detailData($id);
        if ($admin['foto'] != "") {
            unlink('foto/' . $admin['foto']);
        }
        $data = [
            'id_admin' => $id
        ];
        $this->M_Admin->hapus($data);
        session()->setFlashdata('message', 'Di Hapus');
        return redirect()->to(base_url('admin'));
    }
}
