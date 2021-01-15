<?php

namespace App\Models;
 
use CodeIgniter\Model;

class M_Guru extends Model
{
    public function loadData()
    {
        return $this->db->table('guru')->orderBy('id_guru')->get()->getResultArray();
    }

    public function detailData($id)
    {
        return $this->db->table('guru')->where('id_guru', $id)->get()->getRowArray();
    }

    public function tambah($data)
    {
        return $this->db->table('guru')->insert($data);
    }

    public function edit($data)
    {
        return $this->db->table('guru')->where('id_guru', $data['id_guru'])->update($data);
    }

    public function hapus($data)
    {
        return $this->db->table('guru')->where('id_guru', $data['id_guru'])->delete($data);
    }
}
