<?php
class M_Permintaan extends CI_Model
{
    public function insert_record($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tampil_notifikasi_baru()
    {
        return $this->db->query("SELECT * FROM permintaan_perubahan_data_jemaat WHERE is_notif = 0");
    }

    public function jumlah_permintaan_baru()
    {
        return $this->db->query("SELECT count(is_notif) as jumlahPermintaanBaru FROM permintaan_perubahan_data_jemaat WHERE is_notif = 0");
    }

    public function tampil_notifikasi_request()
    {
        return $this->db->query("SELECT id_permintaan, anggota_jemaat.id_anggota, nama_lengkap_anggota, nohp_baru, email_baru, alamat_baru, pekerjaan_baru, tanggal_permintaan, is_notif, is_updated, nohp_anggota,
                                email_anggota, alamat_anggota, pekerjaan_anggota FROM permintaan_perubahan_data_jemaat 
                                INNER JOIN anggota_jemaat ON anggota_jemaat.id_anggota = permintaan_perubahan_data_jemaat.id_anggota ORDER BY tanggal_permintaan DESC");
    }

    public function tampil_data_permintaan($id_permintaan)
    {
        return $this->db->query("SELECT id_permintaan, permintaan_perubahan_data_jemaat.id_anggota, no_anggota, nama_lengkap_anggota, nohp_baru, email_baru, alamat_baru, pekerjaan_baru FROM permintaan_perubahan_data_jemaat 
                                INNER JOIN anggota_jemaat ON anggota_jemaat.id_anggota = permintaan_perubahan_data_jemaat.id_anggota WHERE id_permintaan = '$id_permintaan'");
    }

    public function ubah_status_notif()
    {
        $this->db->query("UPDATE permintaan_perubahan_data_jemaat SET is_notif = 1");
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
