<?php
class M_Ruangan extends CI_Model
{

    public function tampil()
    {
        return $this->db->query("SELECT * FROM ruangan");
    }

    public function informasi_peminjaman()
    {
        return $this->db->query("SELECT * FROM peminjaman_ruangan INNER JOIN ruangan ON peminjaman_ruangan.id_ruangan = ruangan.id_ruangan WHERE is_deleted = 0");
    }

    public function informasi_detail_peminjaman($id_ruangan)
    {
        return $this->db->query("SELECT * FROM peminjaman_ruangan INNER JOIN ruangan ON peminjaman_ruangan.id_ruangan = ruangan.id_ruangan WHERE peminjaman_ruangan.id_ruangan = '$id_ruangan'");
    }

    public function pilih_ruangan($id_ruangan)
    {
        return $this->db->query("SELECT * FROM ruangan WHERE id_ruangan = '$id_ruangan'");
    }

    public function jumlah_peminjaman_baru()
    {
        return $this->db->query("SELECT count(is_notif) as jumlahPeminjamanBaru FROM peminjaman_ruangan WHERE is_notif = 0");
    }

    public function ubah_status_notif()
    {
        $this->db->query("UPDATE peminjaman_ruangan SET is_notif = 1");
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
