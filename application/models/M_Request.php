<?php
class M_Request extends CI_Model {
    public function insert_record($data, $table) {
        $this->db->insert($table, $data);
    }
    public function tampil_notifikasi_request() {
        return $this->db->query("SELECT * FROM permintaan_perubahan_data_jemaat WHERE is_notif = 0");
    }
}