<?php

namespace App\Controllers;

use App\Models\M_kelasonline;
use App\Models\M_Guru;
use App\Models\M_Mapel;
use App\Models\M_Kelas;
 
class VKelasonline extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->M_kelasonline = new M_kelasonline();
        $this->M_Siswa = new M_Guru();
        $this->M_Mapel = new M_Mapel();
        $this->M_Kelas = new M_Kelas();
    }
    public function index()
    {
        $data = [
            'judul' => 'Kelas Online',
            'vkelasonline' => $this->M_kelasonline->loadDataKelasOnlineUser(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('vkelasonline/index');
        echo view('templates/v_footer');
    }
}
