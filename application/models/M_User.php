<?php

class M_User extends CI_Model
{
    public function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function tampil()
    {
        $query = $this->db->query("SELECT * FROM user JOIN level_user ON user.id_level_user = level_user.id_level_user ");
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
