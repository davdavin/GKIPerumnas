<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect('Login_Admin');
        }
        $this->load->model(array('M_Anggota_Jemaat', 'M_Pendeta', 'M_Wilayah', 'M_Request'));
    }

    public function index()
    {
        $data['jumlahJemaat'] = $this->M_Anggota_Jemaat->tampil_total_jemaat()->result();
        $data['jumlahPendeta'] = $this->M_Pendeta->tampil_total_pendeta()->result();
        $data['jumlahWilayah'] = $this->M_Wilayah->tampil_total_wilayah()->result();
        $data['jumlahJemaatWilayah'] = $this->M_Wilayah->total_jemaat_di_wilayah()->result();
        $data['totalStatusJemaat'] = $this->M_Anggota_Jemaat->total_status_jemaat()->result();
        $notif['notifRequest'] = $this->M_Request->tampil_notifikasi_request()->result();
        $this->load->view('templates/header.php', $notif);
        $this->load->view('templates/sidebar.php');
        $this->load->view('v_lihat_dashboard.php', $data);
    }
}
