<?php
class M_Ruangan extends CI_Model
{

    public function tampil()
    {
        return $this->db->query("SELECT * FROM ruangan WHERE deleted_at IS NULL");
    }

    public function urutan_peminjaman_ruangan_terbanyak()
    {
        return $this->db->query("SELECT nama_ruangan, count(id_peminjaman) as total FROM peminjaman_ruangan JOIN ruangan ON peminjaman_ruangan.id_ruangan = ruangan.id_ruangan GROUP BY nama_ruangan ORDER BY count(id_peminjaman) DESC");
    }

    public function informasi_peminjaman()
    {
        /* return $this->db->query("SELECT * FROM peminjaman_ruangan 
                            INNER JOIN ruangan ON peminjaman_ruangan.id_ruangan = ruangan.id_ruangan WHERE deleted_at IS NULL"); */

        return $this->db->query("SELECT id_peminjaman, peminjaman_ruangan.id_ruangan, nama_ruangan, nama_lengkap_anggota, email_anggota, keperluan, tanggal_booking, jam_mulai, jam_selesai, status_peminjaman FROM peminjaman_ruangan 
                                JOIN ruangan ON peminjaman_ruangan.id_ruangan = ruangan.id_ruangan JOIN anggota_jemaat ON peminjaman_ruangan.id_anggota = anggota_jemaat.id_anggota WHERE peminjaman_ruangan.deleted_at IS NULL");
    }

    public function informasi_detail_peminjaman($id_ruangan)
    {
        return $this->db->query("SELECT * FROM peminjaman_ruangan JOIN ruangan ON peminjaman_ruangan.id_ruangan = ruangan.id_ruangan WHERE peminjaman_ruangan.id_ruangan = '$id_ruangan' AND peminjaman_ruangan.deleted_at IS NULL AND status_peminjaman != 'SELESAI'");
    }

    public function detail_peminjaman_oleh_jemaat($id_anggota)
    {
        return $this->db->query("SELECT id_peminjaman, peminjaman_ruangan.id_ruangan, nama_ruangan, nama_lengkap_anggota, keperluan, tanggal_booking, jam_mulai, jam_selesai, status_peminjaman, pesan 
                                FROM peminjaman_ruangan JOIN ruangan ON peminjaman_ruangan.id_ruangan = ruangan.id_ruangan JOIN anggota_jemaat ON peminjaman_ruangan.id_anggota = anggota_jemaat.id_anggota WHERE peminjaman_ruangan.deleted_at IS NULL AND peminjaman_ruangan.id_anggota = '$id_anggota'");
    }

    public function pilih_ruangan($id_ruangan)
    {
        return $this->db->query("SELECT * FROM ruangan WHERE id_ruangan = '$id_ruangan'");
    }

    public function jumlah_peminjaman_baru()
    {
        return $this->db->query("SELECT count(id_peminjaman) as jumlahPeminjamanBaru FROM peminjaman_ruangan WHERE status_peminjaman = 'SEDANG DIPROSES' OR status_peminjaman = 'DITERIMA'");
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
