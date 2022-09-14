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
        $data['wilayah'] = $this->M_Wilayah->tampil()->result();
        $data['jemaat'] = $this->M_Anggota_Jemaat->tampil()->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('admin/wilayah/v_lihat_wilayah.php', $data);
    }

    public function tampil_wilayah()
    {
        $wilayah = $this->M_Wilayah->tampil()->result();
        echo json_encode($wilayah);
    }

    public function tambah_wilayah()
    {
        $baris = $this->M_Wilayah->tampil()->num_rows();
        $kode_wilayah = 'WIL' . $baris + 1;
        $koordinator_wilayah = $this->input->post('id_jemaat');
        $nama_wilayah = $this->input->post('nama_wilayah');

        $data = array(
            'kode_wilayah' => $kode_wilayah,
            'koordinator_wilayah' => $koordinator_wilayah,
            'nama_wilayah' => $nama_wilayah
        );

        $this->M_Wilayah->insert_record($data, 'wilayah');
        $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
        redirect('Wilayah');
    }

    public function edit_wilayah($id_wilayah)
    {
        $data['title'] = "Wilayah";
        $data['wilayahEdit'] = $this->M_Wilayah->tampil_edit($id_wilayah)->result();
        $data['jemaat'] = $this->M_Anggota_Jemaat->tampil()->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('admin/wilayah/v_edit_wilayah', $data);
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

    public function hapus_wilayah($id_wilayah)
    {
        $where = array('id_wilayah' => $id_wilayah);
        $this->M_Wilayah->delete_record($where, 'wilayah');
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
        redirect('Wilayah');
    }
}
