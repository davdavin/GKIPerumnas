<?php
class M_Request extends CI_Model {
    public function insert_record($data, $table) {
        $this->db->insert($table, $data);
    }

    public function tampil_notifikasi_request() {
        return $this->db->query("SELECT nama_lengkap_anggota, nohp_baru, email_baru, alamat_baru, pekerjaan_baru, tanggal_kirim FROM permintaan_perubahan_data_jemaat 
                                INNER JOIN anggota_jemaat ON anggota_jemaat.id_anggota = permintaan_perubahan_data_jemaat.id_anggota WHERE is_notif = 0");
    }
}