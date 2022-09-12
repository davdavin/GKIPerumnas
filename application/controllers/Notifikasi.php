<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != 'login') {
            redirect('Login_Admin');
        }

        $this->load->model(array('M_Permintaan'));
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->M_Permintaan->ubah_status_notif();
        $data['title'] = "Notifikasi";
        $data['notifBaru'] = $this->M_Permintaan->tampil_notifikasi_baru()->result();
        $data['notifRequest'] = $this->M_Permintaan->tampil_notifikasi_request()->result();
        //  $notif2 = $this->M_Permintaan->tampil_notifikasi_request()->result_array();
        /*  for ($i = 0; $i < count($notif2); $i++) {
            $notifikasi['tampil'][$i] = array(
                'nama_lengkap_anggota' =>    $notif2[$i]['nama_lengkap_anggota'],
                'nohp_baru' => $this->deskripsi_notifikasi($notif2[$i]['nohp_baru']),
                'email_baru' => $this->deskripsi_notifikasi($notif2[$i]['email_baru']),
                'alamat_baru' => $this->deskripsi_notifikasi($notif2[$i]['alamat_baru']),
                'pekerjaan_baru' => $this->deskripsi_notifikasi($notif2[$i]['pekerjaan_baru']),
                'waktu_kirim' => $notif2[$i]['waktu_kirim']
            );
        } */
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('v_tampil_notifikasi.php', $data);
    }

    public function hapus_permintaan($id_permintaan)
    {
        $where = array(
            'id_permintaan' => $id_permintaan
        );

        $this->M_Permintaan->delete_record($where, 'permintaan_perubahan_data_jemaat');
        redirect('Notifikasi');
    }
}
