<?php

namespace App\Controllers;

use App\Models\M_Siswakelasonline;
use App\Models\M_Kelasonline;
use App\Models\M_Guru;
use App\Models\M_Siswa;
use App\Models\M_Mapel;
use App\Models\M_Kelas;

use CodeIgniter\I18n\Time;

class Siswakelasonline extends BaseController
{
    public function __construct()
    {
        helper(['url', 'download', 'form', 'date']);
        $this->M_Siswakelasonline = new M_Siswakelasonline();
        $this->M_Kelasonline = new M_Kelasonline();
        $this->M_Guru = new M_Guru();
        $this->M_Siswa = new M_Siswa();
        $this->M_Mapel = new M_Mapel();
        $this->M_Kelas = new M_Kelas();
    }

    public function dashboard()
    {
        $mykelas = new M_Siswakelasonline();
        $data = [
            'judul' => 'Dashboard',
        ];
        $username = session()->get('username');
        $data['mykelas'] = $mykelas->loadData($username);

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('siswakelasonline/dashboard', $data);
        echo view('templates/v_footer');
    }

    public function index()
    {
        $mykelas = new M_Siswakelasonline();
        $data = [
            'judul' => 'Kelas Online',

        ];
        $username = session()->get('username');
        $data['mykelas'] = $mykelas->loadData($username);
        $find = new M_Siswakelasonline();
        $userid = $find->find_id_s($username);
        session()->set('id_siswa', $userid['id_siswa']);

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('siswakelasonline/index', $data);
        echo view('templates/v_footer');
    }

    public function kelas($_id_kelasonline)
    {
        $data = [
            'judul' => 'Kelas Online',
            'materi' => $this->M_Siswakelasonline->loadDataMateri($_id_kelasonline),
            'kelas' => $this->M_Siswakelasonline->loadDataKelas($_id_kelasonline),
        ];
        $data['id_kelasonline'] = $_id_kelasonline;
        session()->set('id_kelasonline', $_id_kelasonline);
        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('siswakelasonline/kelas', $data);
        echo view('templates/v_footer');
    }

    public function viewpdf($id)
    {
        $data = [
            'judul' => 'Preview PDF',
            'materi' => $this->M_Siswakelasonline->detailData($id),
        ];

        echo view('templates/v_header', $data);
        echo view('siswakelasonline/viewpdf');
    }
    public function jtugas($id_materi)
    {
        $data = [
            'judul' => 'Jawaban Tugas Kelas Online',
        ];
        session()->set('id_materi', $id_materi);

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Siswakelasonline/jtugas');
        echo view('templates/v_footer');
    }

    public function tambahjawabantugas()
    {
        $tugas = new M_Siswakelasonline();
        $data = [
            'judul' => 'Jawaban Tugas Kelas Online',
        ];
        $file_tugas = $this->request->getFile('file');
        $file_n = $file_tugas->getClientName();
        $id_materi = session()->get('id_materi');
        $id_kelasonline = session()->get('id_kelasonline');
        $id_siswa = session()->get('id_siswa');
        $created_at = Time::parse('now', 'Asia/Jakarta');
        $tugas->kumpul_tugas($created_at, $file_n, $id_kelasonline, $id_materi, $id_siswa);
        $file_tugas->move('jawaban tugas', $file_n);
        session()->setFlashdata('message', 'Di Tambahkan');
        return redirect()->to(base_url('siswakelasonline/kelas/' . $id_kelasonline));
        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Siswakelasonline/jtugas');
        echo view('templates/v_footer');
    }

    public function presensi($id_materi)
    {
        $data = [
            'judul' => 'Presensi Kelas Online',
        ];
        session()->set('id_materi', $id_materi);

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Siswakelasonline/presensi');
        echo view('templates/v_footer');
    }
    public function tambahpresensi()
    {

        $presensi = new M_Siswakelasonline();
        $data = [
            'judul' => 'Presensi Kelas Online',
        ];
        $created_at = Time::parse('now', 'Asia/Jakarta');
        $id_materi = session()->get('id_materi');
        $id_kelasonline = session()->get('id_kelasonline');
        $id_siswa = session()->get('id_siswa');
        $presensi->presensi($created_at, $id_kelasonline, $id_materi, $id_siswa);

        session()->setFlashdata('message1', 'Presensi');
        return redirect()->to(base_url('siswakelasonline/kelas/' . $id_kelasonline));

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Siswakelasonline/jtugas');
        echo view('templates/v_footer');
    }
}
