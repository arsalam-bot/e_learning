<?php

namespace App\Models;
 
use CodeIgniter\Model;

class M_Kelas extends Model
{
    public function loadData()
    {
        return $this->db->table('kelas')->orderBy('id_kelas')->get()->getResultArray();
    }

    public function detailData($id)
    {
        return $this->db->table('kelas')->where('id_kelas', $id)->get()->getRowArray();
    }

    public function tambah($data)
    {
        return $this->db->table('kelas')->insert($data);
    }

    public function edit($data)
    {
        return $this->db->table('kelas')->where('id_kelas', $data['id_kelas'])->update($data);
    }

    public function hapus($data)
    {
        return $this->db->table('kelas')->where('id_kelas', $data['id_kelas'])->delete($data);
    }
}
