<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect('login');
        }
        $this->load->model(array('M_Anggota_Jemaat', 'M_Pendeta', 'M_Wilayah', 'M_Permintaan', 'M_Keuangan', 'M_Ruangan'));
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['jumlahJemaat'] = $this->M_Anggota_Jemaat->tampil_total_jemaat()->result();
        $data['jumlahPendeta'] = $this->M_Pendeta->tampil_total_pendeta()->result();
        $data['jumlahWilayah'] = $this->M_Wilayah->tampil_total_wilayah()->result();
        $data['jumlahJemaatWilayah'] = $this->M_Wilayah->total_jemaat_di_wilayah()->result();
        $data['totalStatusJemaat'] = $this->M_Anggota_Jemaat->total_status_jemaat()->result();
        $data['totalKeuangan'] = $this->M_Keuangan->total_keuangan()->result();
        $data['permintaanBaru'] = $this->M_Permintaan->jumlah_permintaan_baru()->result();
        $data['peminjamanBaru'] = $this->M_Ruangan->jumlah_peminjaman_baru()->result();
        $data['totalLaki'] = $this->M_Anggota_Jemaat->tampil_jemaat_lakilaki()->result();
        $data['totalPerempuan'] = $this->M_Anggota_Jemaat->tampil_jemaat_perempuan()->result();
        $data['urutanWilayah'] = $this->M_Wilayah->urutan_wilayah_terbanyak()->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/v_dashboard.php', $data);
    }
}
