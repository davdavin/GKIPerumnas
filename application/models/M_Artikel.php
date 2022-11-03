<?php

class M_Artikel extends CI_Model
{
    public function lihat_artikel()
    {
        return $this->db->query("SELECT * FROM artikel");
    }

    public function tampil()
    {
        $query = $this->db->query("SELECT * FROM artikel WHERE status_artikel = 'DITERBITKAN' ORDER BY id_artikel DESC LIMIT 6");
        return $query;
    }

    public function tampil_warta()
    {
        $query = $this->db->query("SELECT * FROM artikel WHERE tipe_artikel = 'Warta Jemaat' AND status_artikel = 'DITERBITKAN' ORDER BY id_artikel DESC LIMIT 6");
        return $query;
    }

    public function semua_artikel($limit, $start)
    {
        $this->db->from('artikel');
        $this->db->where(array('status_artikel' => 'DITERBITKAN'));
        $this->db->order_by('id_artikel', 'DESC');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }

    public function pilihan_artikel($id_artikel)
    {
        return $this->db->query("SELECT * FROM artikel WHERE id_artikel = '$id_artikel'");
    }

    public function pilih_tipe_artikel($tipe, $limit, $start)
    {
        $this->db->from('artikel');
        $this->db->where(array('status_artikel' => 'DITERBITKAN'));
        $this->db->where('tipe_artikel', $tipe);
        $this->db->order_by('id_artikel', 'DESC');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }

    public function cek_pdf($id_artikel)
    {
        return $this->db->query("SELECT isi, file FROM artikel WHERE id_artikel = '$id_artikel'");
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
