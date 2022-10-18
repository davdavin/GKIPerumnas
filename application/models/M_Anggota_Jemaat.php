<?php
class M_Anggota_Jemaat extends CI_Model
{
    public function tampil()
    {
        $query = $this->db->query("SELECT * FROM anggota_jemaat JOIN wilayah ON anggota_jemaat.id_wilayah = wilayah.id_wilayah");
        return $query;
    }

    public function tampil_total_jemaat()
    {
        $query = $this->db->query("SELECT count(id_anggota) as jumlahJemaat FROM anggota_jemaat WHERE status_anggota = 1");
        return $query;
    }

    public function total_status_jemaat()
    {
        return $this->db->query("SELECT count(status_anggota) as total FROM anggota_jemaat GROUP BY status_anggota ORDER BY status_anggota DESC");
    }

    public function tampil_jemaat_lakilaki()
    {
        return $this->db->query("SELECT count(jenis_kelamin_anggota) as jumlahLakilaki FROM anggota_jemaat WHERE jenis_kelamin_anggota = 'Laki-laki' AND status_anggota = 1 ");
    }

    public function tampil_jemaat_perempuan()
    {
        return $this->db->query("SELECT count(jenis_kelamin_anggota) as jumlahPerempuan FROM anggota_jemaat WHERE jenis_kelamin_anggota = 'Perempuan' AND status_anggota = 1");
    }

    public function tampil_jemaat_ulang_tahun($awal)
    {
        return $this->db->query("SELECT nama_lengkap_anggota, nama_wilayah, tanggal_lahir_anggota FROM anggota_jemaat JOIN wilayah ON anggota_jemaat.id_wilayah = wilayah.id_wilayah  
                                WHERE DAY('$awal') = DAY(tanggal_lahir_anggota) AND MONTH('$awal') = MONTH(tanggal_lahir_anggota) AND status_anggota = 1");
    }

    public function insert_record($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tampil_detail($id_anggota)
    {
        return $this->db->query("SELECT * FROM anggota_jemaat JOIN wilayah ON anggota_jemaat.id_wilayah = wilayah.id_wilayah WHERE id_anggota = '$id_anggota'");
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
