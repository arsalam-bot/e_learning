<?php

namespace App\Models;
 
use CodeIgniter\Model;

class M_Mapel extends Model
{
    public function loadData()
    {
        return $this->db->table('mapel')->orderBy('id_mapel')->get()->getResultArray();
    }

    public function detailData($id)
    {
        return $this->db->table('mapel')->where('id_mapel', $id)->get()->getRowArray();
    }

    public function tambah($data)
    {
        return $this->db->table('mapel')->insert($data);
    }

    public function edit($data)
    {
        return $this->db->table('mapel')->where('id_mapel', $data['id_mapel'])->update($data);
    }

    public function hapus($data)
    {
        return $this->db->table('mapel')->where('id_mapel', $data['id_mapel'])->delete($data);
    }
}
