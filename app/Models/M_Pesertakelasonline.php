<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pesertakelasonline extends Model
{
    public function loadData()
    {
        // return $this->db->table('pesertakelasonline')
        //     ->join('kelasonline', 'kelasonline.id_kelasonline = pesertakelasonline.id_kelasonline', 'left')
        //     ->join('siswa', 'siswa.id_siswa = pesertakelasonline.id_siswa', 'left')
        //     ->orderBy('id_pesertakelasonline')->get()->getResultArray();
        $query = $this->db->query('SELECT 
            p.id_pesertakelasonline AS pesertakelasonline,
            m.nama_mapel AS nama_mapel,
            kl.kelas AS kelas,
            n.nama_guru AS nama_guru,
            s.nama_siswa AS nama_siswa
            FROM pesertakelasonline AS p
            JOIN kelasonline AS k
            ON p.id_kelasonline = k.id_kelasonline
            JOIN mapel AS m
            ON k.id_mapel = m.id_mapel
            JOIN kelas AS kl
            ON k.id_kelas = kl.id_kelas
            JOIN guru AS n
            ON k.id_guru = n.id_guru
            JOIN siswa AS s
            ON p.id_siswa = s.id_siswa');
        return $query->getResultArray();
    }

    public function tambah($data)
    {
        return $this->db->table('pesertakelasonline')->insert($data);
    }

    public function edit($data)
    {
        return $this->db->table('pesertakelasonline')->where('id_pesertakelasonline', $data['id_pesertakelasonline'])->update($data);
    }

    public function hapus($data)
    {
        return $this->db->table('pesertakelasonline')->where('id_pesertakelasonline', $data['id_pesertakelasonline'])->delete($data);
    }
}
