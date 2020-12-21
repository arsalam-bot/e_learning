<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kelasonline extends Model
{
    public function loadData()
    {
        return $this->db->table('kelasonline')
            ->join('guru', 'guru.id_guru = kelasonline.id_guru', 'left')
            ->join('mapel', 'mapel.id_mapel = kelasonline.id_mapel', 'left')
            ->join('kelas', 'kelas.id_kelas = kelasonline.id_kelas', 'left')
            ->orderBy('id_kelasonline')->get()->getResultArray();
    }

    public function loadDataGuru()
    {
        return $this->db->table('kelasonline')
            ->join('guru', 'guru.id_guru = kelasonline.id_guru', 'left')
            ->join('mapel', 'mapel.id_mapel = kelasonline.id_mapel', 'left')
            ->join('kelas', 'kelas.id_kelas = kelasonline.id_kelas', 'left')
            ->where('username', session()->get('username'))
            ->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->db->table('kelasonline')->insert($data);
    }

    public function edit($data)
    {
        return $this->db->table('kelasonline')->where('id_kelasonline', $data['id_kelasonline'])->update($data);
    }

    public function hapus($data)
    {
        return $this->db->table('kelasonline')->where('id_kelasonline', $data['id_kelasonline'])->delete($data);
    }
}
