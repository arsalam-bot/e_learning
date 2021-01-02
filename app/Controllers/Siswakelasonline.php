<?php

namespace App\Controllers;

use App\Models\M_Siswakelasonline;
use App\Models\M_Kelasonline;
use App\Models\M_Guru;
use App\Models\M_Siswa;
use App\Models\M_Mapel;
use App\Models\M_Kelas;

class Siswakelasonline extends BaseController
{
    public function __construct()
    {
        helper(['url','download','form']);
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


        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('siswakelasonline/index', $data);
        echo view('templates/v_footer');
    }

    public function kelas($_id_kelasonline)
    {
        // $n_mapel = new M_Siswakelasonline();
        $data = [
            'judul' => 'Kelas Online',
            'materi' => $this->M_Siswakelasonline->loadDataMateri($_id_kelasonline),
        ];
        $data['id_kelasonline'] = $_id_kelasonline;
        // $data['mapel'] = $n_mapel->loadDataMateri($_id_kelasonline);
        // $_id_kelasonline = session()->set('id_kelasonline', $_id_kelasonline);
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

}