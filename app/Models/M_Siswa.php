<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Siswa extends Model
{
    public function loadData()
    {
        return $this->db->table('siswa')->orderBy('id_siswa')->get()->getResultArray();
    }

    public function detailData($id)
    {
        return $this->db->table('siswa')->where('id_siswa', $id)->get()->getRowArray();
    }

    public function tambah($data)
    {
        return $this->db->table('siswa')->insert($data);
    }

    public function edit($data)
    {
        return $this->db->table('siswa')->where('id_siswa', $data['id_siswa'])->update($data);
    }

    public function hapus($data)
    {
        return $this->db->table('siswa')->where('id_siswa', $data['id_siswa'])->delete($data);
    }
}
