<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('status') != 'login') {
            redirect('login');
        }

        $this->load->model(array('M_Keuangan'));
        $this->load->helper('url', 'form');
    }

    public function index() {
        $data['title'] = "Keuangan";
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/keuangan/v_keuangan.php');
    }

    public function tampil_keuangan() {
        $keuangan = $this->M_Keuangan->tampil()->result_array();

        for($i = 0; $i < count($keuangan); $i++) {
            $keuangan[$i]['nominal'] = mata_uang_indo($keuangan[$i]['nominal']);
            $keuangan[$i]['tanggal_masuk'] = tanggal_indonesia($keuangan[$i]['tanggal_masuk']);
        }
        echo json_encode($keuangan);
    }

    public function input_pencatatan() {
        $kegiatan = $this->input->post('kegiatan');
        $nominal = $this->input->post('nominal');
        $tanggal = $this->input->post('tanggal_masuk');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'kegiatan' => $kegiatan, 'nominal' => $nominal, 'tanggal_masuk' => $tanggal, 'keterangan' => $keterangan
        );

        $this->M_Keuangan->insert_record($data, 'keuangan');
        $this->session->set_flashdata('sukses', 'Berhasil dicatat');
        redirect('keuangan');
    }

}