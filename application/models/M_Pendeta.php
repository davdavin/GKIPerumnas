<?php

class M_Pendeta extends CI_Model
{
    public function tampil()
    {
        $query = $this->db->query("SELECT * FROM pendeta");
        return $query;
    }

    public function tampil_total_pendeta()
    {
        $query = $this->db->query('SELECT count(id_pendeta) as jumlahPendeta FROM pendeta WHERE status_pendeta = 1');
        return $query;
    }

    //function ini untuk di controller home
    public function tampil_pendeta()
    {
        return $this->db->query("SELECT nama_lengkap_pendeta, foto_pendeta FROM pendeta WHERE status_pendeta = 1");
    }

    public function insert_record($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tampil_edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    //function ini untuk di controller pendeta
    public function tampil_detail($id_pendeta)
    {
        return $this->db->query("SELECT * FROM pendeta WHERE id_pendeta = '$id_pendeta'");
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
