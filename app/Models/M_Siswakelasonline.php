<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Siswakelasonline extends Model
{
    // protected $table = 'pesertakelasonline';
    // protected $primaryKey = 'id_pesertakelasonline';
    // protected $allowedFields = ['id_kelasonline', 'id_siswa',];

    public function loadData($username)
    {
        $query = $this->db->query("SELECT 
        u.id_pesertakelasonline AS id_pesertakelasonline,
        s.nama_siswa as nama_siswa,
        k.id_kelasonline as id_kelasonline,
        k.id_mapel AS id_mapel,
        m.nama_mapel AS nama_mapel,
        k.fotokelasonline AS fotokelasonline,
        kl.id_kelas AS id_kelas,
        kl.kelas AS kelas,
        g.nama_guru AS nama_guru,
        g.nip AS nip
        FROM pesertakelasonline AS u
        join siswa as s
        ON  u.id_siswa = s.id_siswa 
        join kelasonline as k
        on u.id_kelasonline = k.id_kelasonline
        JOIN mapel AS m 
        ON k.id_mapel = m.id_mapel
        JOIN kelas AS kl
        ON k.id_kelas = kl.id_kelas
        JOIN guru AS g 
        ON k.id_guru = g.id_guru
        WHERE s.username = '$username'");
        return $query->getResultArray();
            
    }

    public function loadDataMateri($_id_kelasonline)
    {
        $query = $this->db->query('SELECT k.id_kelasonline AS id_kelasonline,
        m.id_materi AS id_kelasonline,
        m.judul AS judul,
        m.deskripsi AS deskripsi,
        m.file AS file_materi,
        m.tanggalakses AS tanggalakses,
        m.jamakses AS jamakses,
        p.nama_mapel AS nama_mapel
        FROM kelasonline AS k 
        JOIN materi AS m 
        ON k.id_kelasonline = m.id_kelasonline
        JOIN mapel AS p
        ON k.id_mapel = p.id_mapel
        WHERE m.id_kelasonline = ' . $_id_kelasonline);
        return $query->getResultArray();
    }

    public function detailData($id)
    {
        return $this->db->table('materi')->where('id_materi', $id)->get()->getRowArray();
    }
    
}
