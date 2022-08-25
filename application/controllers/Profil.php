<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect('Login');
        }
        $this->load->model(array('M_Profil', 'M_Wilayah'));
    }

    function index()
    {
        $username = $this->session->userdata('username');
        $data['jemaat'] = $this->M_Profil->tampil_informasi($username)->result();
        $data['wilayah'] = $this->M_Wilayah->tampil()->result();
        $this->load->view('v_profil.php', $data);
    }

    function update_profil($username)
    {
        $data['detail'] = $this->M_Profil->tampil_informasi($username)->result();
        $data['wilayah'] = $this->M_Wilayah->tampil()->result();
        $this->load->view('v_update_informasi.php', $data);
    }

    function proses_update() {
        $no_anggota = $this->input->post('no_anggota');
        $nama_anggota = $this->input->post('nama_anggota');
        $alamat_anggota = $this->input->post('alamat_anggota');
        $nohp_anggota = $this->input->post('nohp');
        $id_wilayah = $this->input->post('id_wilayah');
        $email_anggota = $this->input->post('email_anggota');
        $golongan_darah = $this->input->post('golongan_darah');
        $pendidikan_anggota = $this->input->post('pendidikan');
        $pekerjaan_anggota = $this->input->post('pekerjaan');
        $kelompok_etnis = $this->input->post('kelompok_etnis');
        $tanggal_lahir = $this->input->post('tanggal_lahir');

        $where = array('no_anggota' => $no_anggota);

        $data = array(
            'id_wilayah' => $id_wilayah, 'nama_lengkap_anggota' => $nama_anggota, 'alamat_anggota' => $alamat_anggota,
            'nohp_anggota' => $nohp_anggota, 'email_anggota' => $email_anggota, 'golongan_darah_anggota' => $golongan_darah, 'status_anggota' => 1,
            'pendidikan_anggota' => $pendidikan_anggota, 'pekerjaan_anggota' => $pekerjaan_anggota, 'kelompok_etnis_anggota' => $kelompok_etnis, 'tanggal_lahir_anggota' => $tanggal_lahir   
        );

        $this->M_Profil->update_record($where, $data, 'anggota_jemaat');
        $this->session->set_flashdata('sukses', 'Data berhasil diubah');
        redirect('Profil');
    }
}
