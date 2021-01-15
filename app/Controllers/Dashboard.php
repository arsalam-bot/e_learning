<?php

namespace App\Controllers;
 
use App\Models\M_Kelasonline;
use App\Models\M_Guru;
use App\Models\M_Mapel;
use App\Models\M_Kelas;

class Dashboard extends BaseController
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
        echo view('dashboard/index');
        echo view('templates/v_footer');
    }
}
