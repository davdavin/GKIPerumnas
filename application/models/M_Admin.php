<?php

class M_Admin extends CI_Model
{
    public function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function tampil()
    {
        $query = $this->db->query("SELECT * FROM admin JOIN level_admin ON admin.id_level_admin = level_admin.id_level_admin ");
        return $query;
    }

    public function tampil_level()
    {
        return $this->db->query("SELECT * FROM level_admin");
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
