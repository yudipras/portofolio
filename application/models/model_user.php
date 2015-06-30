<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');
class Model_user extends CI_Model
{
    public function pengguna($username)
    {
        $query = $this->db->query("SELECT * FROM pengguna WHERE userid='$username'");
        return $query->result();

    }

    public function hitungpengguna($username, $pass)
    {
        $query = $this->db->query("SELECT * FROM pengguna WHERE userid='$username' and pass='$pass'");
        return $query->num_rows();

    }

}
