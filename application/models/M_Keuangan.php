<?php
class M_Keuangan extends CI_Model
{

    public function tampil()
    {
        return $this->db->query("SELECT * FROM pemasukan_keuangan");
    }

    public function total_keuangan()
    {
        return $this->db->query("SELECT sum(uang_masuk) as total FROM pemasukan_keuangan");
    }

    public function saldo_akhir()
    {
        return $this->db->query("SELECT saldo_akhir as saldo FROM laporan_keuangan ORDER BY id_laporan_keuangan DESC");
    }

    public function menampilkan_laporan()
    {
        return $this->db->query("SELECT * FROM laporan_keuangan INNER JOIN pemasukan_keuangan ON laporan_keuangan.id_pemasukan = pemasukan_keuangan.id_pemasukan ORDER BY id_laporan_keuangan DESC");
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
