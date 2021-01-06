<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Auth;

class Auth extends Controller
{
    public function __construct()
    {
        helper('form');
    }

    public function index()
    {
        $data = [
            'judul' => 'Halaman Login',
        ];
        echo view('v_login', $data);
    }

    public function cek_login()
    {
        $model = new M_auth();
        $email = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cek_admin = $model->login_admin($email, $password);
        $cek_guru = $model->login_guru($email, $password);
        $cek_siswa = $model->login_siswa($email, $password);

        if ($cek_admin) {
            session()->set('log', true);
            session()->set('username', $cek_admin['username']);
            session()->set('level', $cek_admin['level']);
            session()->set('nama', $cek_admin['nama']);
            session()->set('foto', $cek_admin['foto']);
            //redirect data
            if (session()->get('level') == "Admin") {
                return redirect()->to(base_url('/home'));
            } elseif ($cek_admin) {
                session()->set('log', true);
                session()->set('username', $cek_admin['username']);
                session()->set('level', $cek_admin['level']);
                session()->set('nama', $cek_admin['nama']);
                session()->set('foto', $cek_admin['foto']);
                //redirect data
                if (session()->get('level') == "Kepsek") {
                    return redirect()->to(base_url('/home'));
                }
            }
        } elseif ($cek_guru) {
            session()->set('log', true);
            session()->set('username', $cek_guru['username']);
            session()->set('level', $cek_guru['level']);
            session()->set('nama_guru', $cek_guru['nama_guru']);
            session()->set('foto', $cek_guru['foto']);
            //redirect data
            if (session()->get('level') == "Guru") {
                return redirect()->to(base_url('/home'));
            }
        } elseif ($cek_siswa) {
            session()->set('log', true);
            session()->set('username', $cek_siswa['username']);
            session()->set('level', $cek_siswa['level']);
            session()->set('nama_siswa', $cek_siswa['nama_siswa']);
            session()->set('foto', $cek_siswa['foto']);
            //redirect data
            if (session()->get('level') == "Siswa") {
                return redirect()->to(base_url('/home'));
            }
        } else {
            session()->setFlashdata('msg', 'Email atau Password Salah');
            return redirect()->to('/auth');
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('nama');
        session()->remove('nama_siswa');
        session()->remove('nama');
        session()->remove('nama_guru');
        session()->remove('foto');
        session()->remove('username');
        session()->remove('level');
        return redirect()->to('login');
    }
}
