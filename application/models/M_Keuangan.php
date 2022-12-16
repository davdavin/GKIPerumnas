<?php
class M_Keuangan extends CI_Model
{

    public function menampilkan_pemasukan()
    {
        return $this->db->query("SELECT id_keuangan, kegiatan, keterangan, uang_masuk, tanggal_terima, tanggal_pencatatan, is_debit FROM keuangan WHERE is_debit = '1'");
    }

    public function menampilkan_pengeluaran()
    {
        return $this->db->query("SELECT id_keuangan, kegiatan, keterangan, uang_keluar, tanggal_keluar, tanggal_pencatatan, is_kredit FROM keuangan WHERE is_kredit = '1'");
    }

    public function menampilkan_laporan()
    {
        return $this->db->query("SELECT * FROM keuangan ORDER BY id_keuangan DESC");
    }

    public function total_keuangan()
    {
        return $this->db->query("SELECT saldo_akhir as total FROM keuangan ORDER BY id_keuangan DESC LIMIT 1");
    }

    public function saldo_akhir()
    {
        return $this->db->query("SELECT saldo_akhir as saldo FROM keuangan ORDER BY id_keuangan DESC LIMIT 1");
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
