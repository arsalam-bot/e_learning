<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Siswakelasonline extends Model
{
    protected $useTimestamps = false;
    // protected $table = 'presensi';
    // protected $primaryKey = 'id_presensi';
    // protected $allowedFields = ['id_kelasonline', 'id_materi', 'id_siswa'];

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
        m.id_materi AS id_materi,
        m.judul AS judul,
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

    public function loadDataKelas($_id_kelasonline)
    {
        $query = $this->db->query('SELECT k.id_kelasonline AS id_kelasonline,        
        p.nama_mapel AS nama_mapel,
        kl.kelas AS kelas
        FROM kelasonline AS k         
        JOIN mapel AS p
        ON k.id_mapel = p.id_mapel
        JOIN kelas AS kl
        ON k.id_kelas = kl.id_kelas
        WHERE k.id_kelasonline = ' . $_id_kelasonline);
        return $query->getRowArray();
    }

    public function detailData($id)
    {
        return $this->db->table('materi')->where('id_materi', $id)->get()->getRowArray();
    }
    public function find_id_s($username)
    {
        $query = $this->db->query("SELECT s.id_siswa AS id_siswa,
        s.username AS username
        FROM siswa AS s
        WHERE s.username =  '$username'");
        return $query->getRowArray();
    }

    public function kumpul_tugas($created_at, $file_n, $id_kelasonline, $id_materi, $id_siswa)
    {
        $query = $this->db->query("INSERT INTO `j_tugas`(`id_kelasonline`, `id_materi`, `id_siswa`, `file`, `created_at`) 
        VALUES ('$id_kelasonline','$id_materi','$id_siswa','$file_n','$created_at')");
        return $query->getResultArray();
    }


    public function presensi($created_at, $id_kelasonline, $id_materi, $id_siswa)
    {
        $query = $this->db->query("INSERT INTO `presensi`(`id_kelasonline`, `id_materi`, `id_siswa`, `created_at`) 
        VALUES ('$id_kelasonline','$id_materi','$id_siswa','$created_at')");
        return $query->getResultArray();
    }
}
