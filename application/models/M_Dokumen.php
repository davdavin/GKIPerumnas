<?php

class M_Dokumen extends CI_Model {
   public function tampil() {
        $query = $this->db->query("SELECT * FROM dokumen");
        return $query;
    }

    public function tampil_pengumpulan() {
        $query = $this->db->query("SELECT * FROM dokumen, pengumpulan_dokumen WHERE pengumpulan_dokumen.id_dokumen = dokumen.id_dokumen");
        return $query;
    }

    //pengumpulan dokumen oleh jemaat dan input dokumen baru oleh admin
    public function insert_record($data,$table) {
        $this->db->insert($table, $data);
    }

    public function tampil_edit($where, $table) {
        return $this->db->get_where($table, $where);
    }
    
    public function update_record($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    public function delete_record($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }
}