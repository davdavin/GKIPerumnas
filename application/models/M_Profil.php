<?php
class M_Profil extends CI_Model
{
    public function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function tampil_informasi($username)
    {
        return $this->db->query("SELECT * FROM anggota_jemaat WHERE username = '$username'");
    }

    public function update_record($where, $data, $table) 
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
