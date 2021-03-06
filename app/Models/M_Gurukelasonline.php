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

    public function loadDataJawabanTugas($id_materinya)
    {
        $query = $this->db->query('SELECT 
                k.id_kelasonline AS id_kelasonline,
                n.nama_mapel AS nama_mapel,
                m.judul AS judul,
                s.nisn AS nisn,
                s.nama_siswa AS nama_siswa,
                j.file AS nama_file,
                m.id_materi AS id_materi,
                j.id_jtugas AS id_jtugas,
                j.created_at AS jam_tugas
                FROM j_tugas AS j
                JOIN kelasonline AS k
                ON j.id_kelasonline = k.id_kelasonline
                JOIN mapel AS n
                ON k.id_mapel = n.id_mapel
                JOIN materi AS m
                ON j.id_materi = m.id_materi
                JOIN siswa AS s
                ON j.id_siswa = s.id_siswa
                WHERE j.id_materi = ' . $id_materinya);
        return $query->getResultArray();
    }

    public function loadDataPresensi($id_presensinya)
    {
        $query = $this->db->query('SELECT 
		        s.nisn AS nisn,
                s.nama_siswa AS nama_siswa,
                m.judul AS judul_topik,
                p.created_at AS jam_absen
                FROM presensi AS p
                JOIN siswa AS s
                ON p.id_siswa = s.id_siswa
                JOIN materi AS m
                ON p.id_materi = m.id_materi
                WHERE p.id_materi = ' . $id_presensinya);
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

    public function tambahmateri($data)
    {
        return $this->db->table('materi')->insert($data);
    }

    public function detailData($id)
    {
        return $this->db->table('materi')->where('id_materi', $id)->get()->getRowArray();
    }
    public function detailPDF($id)
    {
        return $this->db->table('materi')->where('id_materi', $id)->get()->getRowArray();
    }
    public function detailjawabanPDF($id)
    {
        $query = $this->db->query('SELECT 
        j.id_jtugas AS id_jtugas,
        s.id_siswa AS id_siswa,
        s.nama_siswa AS nama_siswa,
        j.file AS nama_file
        FROM j_tugas AS j
        JOIN siswa AS s
        ON j.id_siswa = s.id_siswa
        WHERE j.id_jtugas = ' . $id);
        return $query->getRowArray();
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
