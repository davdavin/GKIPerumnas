<?php

class M_Wilayah extends CI_Model
{
    public function tampil()
    {
        $query = $this->db->query('SELECT * FROM wilayah JOIN anggota_jemaat ON anggota_jemaat.id_anggota = wilayah.koordinator_wilayah');
        return $query;
    }
    public function tampil_total_wilayah()
    {
        $query = $this->db->query('SELECT count(id_wilayah) as jumlahWilayah FROM wilayah');
        return $query;
    }

    public function total_jemaat_di_wilayah()
    {
        return $this->db->query("SELECT wilayah.nama_wilayah, count(anggota_jemaat.id_wilayah) as total FROM anggota_jemaat INNER JOIN wilayah 
                                    on anggota_jemaat.id_wilayah = wilayah.id_wilayah WHERE status_anggota = '1' GROUP BY nama_wilayah");
    }

    public function urutan_wilayah_terbanyak()
    {
        return $this->db->query("SELECT nama_wilayah, count(anggota_jemaat.id_anggota) as total FROM anggota_jemaat INNER JOIN wilayah ON anggota_jemaat.id_wilayah = wilayah.id_wilayah 
                                WHERE status_anggota = '1' GROUP BY nama_wilayah ORDER BY count(anggota_jemaat.id_anggota) DESC");
    }

    public function insert_record($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tampil_edit($id_wilayah)
    {
        return $this->db->query("SELECT * FROM wilayah INNER JOIN anggota_jemaat ON anggota_jemaat.id_anggota = wilayah.koordinator_wilayah WHERE wilayah.id_wilayah = '$id_wilayah'");
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
