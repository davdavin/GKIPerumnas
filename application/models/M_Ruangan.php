<?php
class M_Ruangan extends CI_Model
{

    public function tampil()
    {
        return $this->db->query("SELECT * FROM ruangan");
    }

    public function informasi_peminjaman()
    {
        return $this->db->query("SELECT * FROM peminjaman_ruangan INNER JOIN ruangan ON peminjaman_ruangan.id_ruangan = ruangan.id_ruangan");
    }

    public function informasi_detail_peminjaman($id_ruangan)
    {
        return $this->db->query("SELECT * FROM peminjaman_ruangan INNER JOIN ruangan ON peminjaman_ruangan.id_ruangan = ruangan.id_ruangan WHERE peminjaman_ruangan.id_ruangan = '$id_ruangan'");
    }

    public function pilih_ruangan($id_ruangan)
    {
        return $this->db->query("SELECT * FROM ruangan WHERE id_ruangan = '$id_ruangan'");
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
