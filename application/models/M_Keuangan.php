<?php
class M_Keuangan extends CI_Model {

    public function tampil() {
        return $this->db->query("SELECT * FROM keuangan");
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