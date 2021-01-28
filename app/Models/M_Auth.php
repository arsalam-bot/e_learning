<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Auth extends Model
{
    public function login_admin($email, $password)
    {
        return $this->db->table('admin')->where([
            'username' => $email,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function login_guru($email, $password)
    {
        return $this->db->table('guru')->where([
            'username' => $email,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function login_siswa($email, $password)
    {
        return $this->db->table('siswa')->where([
            'username' => $email,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function search($username)
    {
        $query = $this->db->query("SELECT nip, nama_guru, password, username FROM guru WHERE username='$username'");

        return $query->getRowArray();
    }
    public function searchS($usernameS)
    {
        $query = $this->db->query("SELECT nisn, nama_siswa, password, username FROM siswa WHERE username='$usernameS'");

        return $query->getRowArray();
    }
    public function searchA($usernameA)
    {
        $query = $this->db->query("SELECT nama, password, username FROM admin WHERE username='$usernameA'");

        return $query->getRowArray();
    }
}
