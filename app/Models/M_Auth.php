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

    // public function s_guru($username)
    // {
    //     $query = $this->db->query(
    //     "SELECT nip AS nip, 
    //     nama_guru AS nama,  
    //     username AS username, 
    //     password AS passwordguru 
    //     FROM guru 
    //     WHERE username = '$username'");
    //     return $query->getRowArray();
    // }

    public function search($username)
    {
        $query = $this->db->query("SELECT nip, nama_guru, password, username FROM guru WHERE username='$username'");

        return $query->getRowArray();
    }
}
