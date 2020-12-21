<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pesertakelasonline extends Model
{
    public function loadData()
    {
        return $this->db->table('pesertakelasonline')
            ->join('kelasonline', 'kelasonline.id_kelasonline = pesertakelasonline.id_kelasonline', 'left')
            ->join('siswa', 'siswa.id_siswa = pesertakelasonline.id_siswa', 'left')
            ->orderBy('id_pesertakelasonline')->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->db->table('pesertakelasonline')->insert($data);
    }

    public function edit($data)
    {
        return $this->db->table('pesertakelasonline')->where('id_pesertakelasonline', $data['id_pesertakelasonline'])->update($data);
    }

    public function hapus($data)
    {
        return $this->db->table('pesertakelasonline')->where('id_pesertakelasonline', $data['id_pesertakelasonline'])->delete($data);
    }
}
