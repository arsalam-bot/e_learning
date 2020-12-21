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
}
