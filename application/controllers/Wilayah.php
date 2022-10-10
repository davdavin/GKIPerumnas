<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

    public function edit_wilayah($id_wilayah)
    {
        $data['title'] = "Wilayah";
        $data['wilayahEdit'] = $this->M_Wilayah->tampil_edit($id_wilayah)->result();
        $data['jemaat'] = $this->M_Anggota_Jemaat->tampil()->result();
        $data['id_wilayah'] = $id_wilayah;
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/wilayah/v_edit_wilayah', $data);
    }

    public function nama_jemaat_per_wilayah($id_wilayah)
    {
        if (!isset($_POST['searchJemaat'])) {
            $nama = $this->db->query("SELECT id_anggota, nama_lengkap_anggota, nama_wilayah FROM anggota_jemaat INNER JOIN wilayah ON anggota_jemaat.id_wilayah = Wilayah.id_wilayah WHERE anggota_jemaat.id_wilayah = '$id_wilayah'")->result_array();
        } else {
            $search = strtolower($_POST['searchJemaat']);
            $nama = $this->db->query("SELECT id_anggota, nama_lengkap_anggota, nama_wilayah FROM anggota_jemaat INNER JOIN wilayah ON anggota_jemaat.id_wilayah = Wilayah.id_wilayah WHERE nama_lengkap_anggota LIKE '%$search%' AND anggota_jemaat.id_wilayah = '$id_wilayah'")->result_array();
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
        $koordinator_wilayah = $this->input->post('id_jemaat');
        $nama_wilayah = $this->input->post('nama_wilayah');

        $where = array('id_wilayah' => $id_wilayah);

        $data = array(
            'koordinator_wilayah' => $koordinator_wilayah,
            'nama_wilayah' => $nama_wilayah
        );

        $this->M_Wilayah->update_record($where, $data, 'wilayah');
        $this->session->set_flashdata('sukses', 'Data berhasil diubah');
        redirect('Wilayah');
    }
}
