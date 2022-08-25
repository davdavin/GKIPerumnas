<?php

class M_Login_Jemaat extends CI_Model
{
    public function cek_login($table, $where)
    {
        $this->db->get_where($table, $where);
    }
}
