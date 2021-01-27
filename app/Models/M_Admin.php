<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Admin extends Model
{
    public function loadData()
    {
        return $this->db->table('admin')->orderBy('id_admin')->get()->getResultArray();
    }

    public function detailData($id)
    {
        return $this->db->table('admin')->where('id_admin', $id)->get()->getRowArray();
    }

    public function tambah($data)
    {
        return $this->db->table('admin')->insert($data);
    }

    public function edit($data)
    {
        return $this->db->table('admin')->where('id_admin', $data['id_admin'])->update($data);
    }

    public function hapus($data)
    {
        return $this->db->table('admin')->where('id_admin', $data['id_admin'])->delete($data);
    }

    public function s_admin($username)
    {
        $query = $this->db->query(
        "SELECT nip AS nip, 
        nama_guru AS nama,  
        username AS username, 
        password AS passwordguru 
        FROM guru 
        WHERE username = '$username'");
        return $query->getRowArray();
    }
}
