<?php

class M_User extends CI_Model
{
    public function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function tampil()
    {
        // $query = $this->db->query("SELECT * FROM user JOIN level_user ON user.id_level_user = level_user.id_level_user");
        $query = $this->db->query("SELECT user.id_user, nama_lengkap_anggota as nama_lengkap, user.username, email_anggota as email, level_user, status_user FROM `user` LEFT JOIN anggota_jemaat ON anggota_jemaat.id_anggota = user.id_anggota INNER JOIN level_user ON level_user.id_level_user = user.id_level_user 
                                    WHERE anggota_jemaat.id_anggota = user.id_anggota UNION SELECT user.id_user, nama_lengkap_pendeta as nama_lengkap, user.username, email_pendeta as email, level_user, status_user FROM user 
                                    RIGHT JOIN pendeta ON pendeta.id_pendeta = user.id_pendeta INNER JOIN level_user ON level_user.id_level_user = user.id_level_user WHERE pendeta.id_pendeta = user.id_pendeta");
        return $query;
    }

    public function tampil_level()
    {
        return $this->db->query("SELECT * FROM level_user");
    }

    public function insert_record($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_record($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_record($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
