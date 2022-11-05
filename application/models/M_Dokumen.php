<?php

class M_Dokumen extends CI_Model
{
    public function tampil()
    {
        return $this->db->query("SELECT * FROM dokumen");
    }

    public function tampil_dokumen_diterbitkan()
    {
        return $this->db->query("SELECT * FROM dokumen WHERE status_dokumen = 'DITERBITKAN'");
    }

    public function tampil_pengumpulan()
    {
        return $this->db->query("SELECT jenis_dokumen, id_pengumpulan, nama_lengkap_pengumpul, email_pengumpul, pengumpulan_dokumen.nama_dokumen, pengumpulan_dokumen.created_at 
                                FROM dokumen JOIN pengumpulan_dokumen ON dokumen.id_dokumen = pengumpulan_dokumen.id_dokumen ORDER BY id_pengumpulan DESC");
    }

    public function insert_record($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tampil_edit($where, $table)
    {
        return $this->db->get_where($table, $where);
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
