<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Wilayah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect('login');
        }

        $this->load->model(array('M_Wilayah', 'M_Anggota_Jemaat'));
    }

    public function index()
    {
        $data['title'] = "Wilayah";
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/wilayah/v_lihat_wilayah.php', $data);
    }

    public function tampil_wilayah()
    {
        $wilayah = $this->M_Wilayah->tampil()->result();
        echo json_encode($wilayah);
    }

    public function nama_jemaat()
    {
        if (!isset($_POST['searchJemaat'])) {
            $nama = $this->db->query("SELECT id_anggota, nama_lengkap_anggota FROM anggota_jemaat")->result_array();
        } else {
            $search = strtolower($_POST['searchJemaat']);
            $nama = $this->db->query("SELECT id_anggota, nama_lengkap_anggota FROM anggota_jemaat WHERE nama_lengkap_anggota LIKE '%$search%'")->result_array();
        }

        $list = array();
        for ($i = 0; $i < count($nama); $i++) {
            $list[$i]['id'] = $nama[$i]['id_anggota'];
            $list[$i]['text'] = $nama[$i]['nama_lengkap_anggota'];
        }

        echo json_encode($list);
    }

    public function tambah_wilayah()
    {
        $nama_wilayah = $this->input->post('nama_wilayah');
        $tanggal = date('Y-m-d H:i:s');

        $data = array(
            'nama_wilayah' => $nama_wilayah,
            'is_koordinator' => 0,
            'created_at' => $tanggal
        );

        $this->M_Wilayah->insert_record($data, 'wilayah');
        $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
        redirect('Wilayah');
    }

    public function pilih_koordinator_wilayah($id_wilayah)
    {
        $data['title'] = "Wilayah";
        $data['wilayah'] = $this->M_Wilayah->pilih_wilayah($id_wilayah)->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/wilayah/v_pilih_koordinator_wilayah', $data);
    }

    public function proses_pilih_koordinator_wilayah()
    {
        $id_wilayah = $this->input->post('id_wilayah');
        $koordinator_wilayah = $this->input->post('koordinator_wilayah');
        $tanggal = date('Y-m-d H:i:s');

        $where = array(
            'id_wilayah' => $id_wilayah
        );

        $data_wilayah = array(
            'is_koordinator' => 1,
            'updated_at' => $tanggal
        );

        $data_koordinator_wilayah = array(
            'id_wilayah' => $id_wilayah,
            'koordinator_wilayah' => $koordinator_wilayah,
            'created_at' => $tanggal
        );

        $where_anggota = array(
            'id_anggota' => $koordinator_wilayah
        );

        $data_anggota = array(
            'jabatan_anggota' => 'Pengurus',
            'updated_at' => $tanggal
        );

        $this->M_Anggota_Jemaat->update_record($where_anggota, $data_anggota, 'anggota_jemaat');
        $this->M_Wilayah->update_record($where, $data_wilayah, 'wilayah');
        $this->M_Wilayah->insert_record($data_koordinator_wilayah, 'detail_wilayah');
        $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
        redirect('Wilayah');
    }

    public function edit_wilayah($id_wilayah)
    {
        $data['title'] = "Wilayah";
        $data['wilayahEdit'] = $this->M_Wilayah->tampil_edit($id_wilayah)->result();
        //    $data['jemaat'] = $this->M_Anggota_Jemaat->tampil()->result();
        $data['id_wilayah'] = $id_wilayah;
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/wilayah/v_edit_wilayah', $data);
    }

    public function nama_jemaat_per_wilayah($id_wilayah)
    {
        if (!isset($_POST['searchJemaat'])) {
            $nama = $this->db->query("SELECT id_anggota, nama_lengkap_anggota, nama_wilayah FROM anggota_jemaat JOIN wilayah ON anggota_jemaat.id_wilayah = Wilayah.id_wilayah WHERE anggota_jemaat.id_wilayah = '$id_wilayah' AND status_anggota = 'AKTIF'")->result_array();
        } else {
            $search = strtolower($_POST['searchJemaat']);
            $nama = $this->db->query("SELECT id_anggota, nama_lengkap_anggota, nama_wilayah FROM anggota_jemaat JOIN wilayah ON anggota_jemaat.id_wilayah = Wilayah.id_wilayah WHERE nama_lengkap_anggota LIKE '%$search%' AND anggota_jemaat.id_wilayah = '$id_wilayah' AND status_anggota = 'AKTIF'")->result_array();
        }

        $list = array();
        for ($i = 0; $i < count($nama); $i++) {
            $list[$i]['id'] = $nama[$i]['id_anggota'];
            $list[$i]['text'] = $nama[$i]['nama_lengkap_anggota'] . ' - ' . $nama[$i]['nama_wilayah'];
        }

        echo json_encode($list);
    }

    public function proses_edit_wilayah()
    {
        $id_wilayah = $this->input->post('id_wilayah');
        $koordinator_wilayah_sekarang = $this->input->post('koordinator_wilayah_sekarang');
        $koordinator_wilayah_baru = $this->input->post('koordinator_wilayah_baru');
        $nama_wilayah = $this->input->post('nama_wilayah');

        $tanggal = date('Y-m-d H:i:s');

        $where = array('id_wilayah' => $id_wilayah);

        $data_wilayah = array(
            'nama_wilayah' => $nama_wilayah,
            'updated_at' => $tanggal
        );

        if ($koordinator_wilayah_baru != $koordinator_wilayah_sekarang && $koordinator_wilayah_baru != NULL) {
            $data_detail_wilayah = array(
                'koordinator_wilayah' => $koordinator_wilayah_baru,
                'updated_at' => $tanggal
            );

            $where_anggota_koordinator_baru = array(
                'id_anggota' => $koordinator_wilayah_baru
            );

            $data_anggota_koordinator_baru = array(
                'jabatan_anggota' => 'Pengurus',
                'updated_at' => $tanggal
            );

            $where_anggota_koordinator_sekarang = array(
                'id_anggota' => $koordinator_wilayah_sekarang
            );

            $data_anggota_koordinator_sekarang = array(
                'jabatan_anggota' => 'Jemaat',
                'updated_at' => $tanggal
            );

            $this->M_Anggota_Jemaat->update_record($where_anggota_koordinator_sekarang, $data_anggota_koordinator_sekarang, 'anggota_jemaat');
            $this->M_Anggota_Jemaat->update_record($where_anggota_koordinator_baru, $data_anggota_koordinator_baru, 'anggota_jemaat');
        } else if ($koordinator_wilayah_baru == NULL) {
            $data_detail_wilayah = array(
                'koordinator_wilayah' => $koordinator_wilayah_sekarang
            );
        }
        $this->M_Wilayah->update_record($where, $data_wilayah, 'wilayah');
        $this->M_Wilayah->update_record($where, $data_detail_wilayah, 'detail_wilayah');
        $this->session->set_flashdata('sukses', 'Data berhasil diubah');
        redirect('Wilayah');
    }
}
