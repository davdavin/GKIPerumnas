<?php

class M_Konten extends CI_Model {
    public function tampil_konten_slide() {
        $query = $this->db->query('SELECT * FROM konten_slide');
        return $query;
    }

    public function tampil_konten_foto_ibadah() {
        $query = $this->db->query('SELECT * FROM konten_foto_ibadah');
        return $query;
    }

    public function tampil_nama_momen() {
        $query = $this->db->query("SELECT momen FROM konten_foto_ibadah GROUP BY momen");
        return $query;
    }

    public function tampil_konten_slide1() {
        $query = $this->db->query('SELECT * FROM konten_slide WHERE id_slide = 1');
        return $query;
    }

    public function tampil_konten_slide2() {
        $query = $this->db->query('SELECT * FROM konten_slide WHERE id_slide = 2');
        return $query;
    }

    public function tampil_konten_slide3() {
        $query = $this->db->query('SELECT * FROM konten_slide WHERE id_slide = 3');
        return $query;
    }

    public function tampil_konten_slide4() {
        $query = $this->db->query('SELECT * FROM konten_slide WHERE id_slide = 4');
        return $query;
    }

    public function tampil_konten_slide5() {
        $query = $this->db->query('SELECT * FROM konten_slide WHERE id_slide = 5');
        return $query;
    }

    public function tampil_foto_ibadah() {
        $query = $this->db->query('SELECT * FROM konten_foto_ibadah');
        return $query;
    }

    public function tampil_edit_slide($id_slide) {
        return $this->db->query("SELECT * FROM konten_slide WHERE id_slide = '$id_slide'");
    }

    public function update_record($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);

    }
}