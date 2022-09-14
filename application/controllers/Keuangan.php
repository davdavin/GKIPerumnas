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
        echo json_encode($keuangan);
    }
}