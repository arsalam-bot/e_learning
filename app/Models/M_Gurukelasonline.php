<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Gurukelasonline extends Model
{
    protected $table = 'materi';
    protected $primaryKey = 'id_materi';
    protected $allowedFields = ['id_kelasonline', 'deskripsi', 'file',];

    public function loadData()
    {
        return $this->db->table('kelasonline')
            ->join('guru', 'guru.id_guru = kelasonline.id_guru', 'left')
            ->join('mapel', 'mapel.id_mapel = kelasonline.id_mapel', 'left')
            ->join('kelas', 'kelas.id_kelas = kelasonline.id_kelas', 'left')
            ->where('username', session()->get('username'))
            ->get()->getResultArray();
    }

    public function loadDataMateri($_id_kelasonline)
    {
        $query = $this->db->query('SELECT k.id_kelasonline AS id_kelasonline,
        m.id_materi AS id_kelasonline,
        m.deskripsi AS deskripsi,
        m.file AS file_materi,
        p.nama_mapel AS nama_mapel
        FROM kelasonline AS k 
        JOIN materi AS m 
        ON k.id_kelasonline = m.id_kelasonline
        JOIN mapel AS p
        ON k.id_mapel = p.id_mapel
        WHERE m.id_kelasonline = ' . $_id_kelasonline);
        return $query->getResultArray();
    }

    public function tambahmateri($data)
    {
        return $this->db->table('materi')->insert($data);
    }

    public function detailData($id)
    {
        return $this->db->table('materi')->where('id_materi', $id)->get()->getRowArray();
    }

    public function edit($data)
    {
        return $this->db->table('materi')->where('id_materi', $data['id_materi'])->update($data);
    }


    public function hapus($data)
    {
        return $this->db->table('materi')->where('id_materi', $data['id_materi'])->delete($data);
    }
}

// public function tambahmateri($id_kelasonline, $deskripsi, $file)
// {
//     $query = $this->db->query("INSERT INTO `materi`(`id_kelasonline`, `deskripsi`, `file`) VALUES ('$id_kelasonline','$deskripsi','$file');");
//     return $query->result_array();
// }