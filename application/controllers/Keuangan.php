<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Keuangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != 'login') {
            redirect('login');
        }

        $this->load->model(array('M_Keuangan'));
        $this->load->helper('url', 'form');
    }

    public function index()
    {
        $data['title'] = "Keuangan";
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/keuangan/v_pemasukan.php');
    }

    public function tampil_keuangan()
    {
        $keuangan = $this->M_Keuangan->tampil()->result_array();

        for ($i = 0; $i < count($keuangan); $i++) {
            $keuangan[$i]['uang_masuk'] = mata_uang_indo($keuangan[$i]['uang_masuk']);
            $keuangan[$i]['tanggal_masuk'] = tanggal_indonesia($keuangan[$i]['tanggal_masuk']);
        }
        echo json_encode($keuangan);
    }

    public function pencatatan()
    {
        $kegiatan = $this->input->post('kegiatan');
        $uang_masuk = $this->input->post('uang_masuk');
        $tanggal = $this->input->post('tanggal_masuk');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'kegiatan' => $kegiatan, 'uang_masuk' => $uang_masuk, 'tanggal_masuk' => $tanggal, 'keterangan' => $keterangan
        );


        $this->M_Keuangan->insert_record($data, 'pemasukan_keuangan');

        $id_pemasukan = $this->db->insert_id();

        $laporan = $this->M_Keuangan->saldo_akhir()->row_array();

        if (isset($laporan['saldo']) == NULL) {
            $saldo = '0';
        } else {
            $saldo = $laporan['saldo'];
        }

        $saldo_tambah = $saldo + $uang_masuk;

        $tanggal = date('Y-m-d H:i:s');

        $data_laporan = array(
            'id_pemasukan' => $id_pemasukan, 'saldo_awal' => $saldo, 'saldo_akhir' => $saldo_tambah, 'tanggal_perubahan' => $tanggal, 'operation' => '+'
        );
        $this->M_Keuangan->insert_record($data_laporan, 'laporan_keuangan');
        $this->session->set_flashdata('sukses', 'Berhasil dicatat');
        redirect('keuangan');
    }

    public function laporan()
    {
        $data['title'] = "Keuangan";
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/keuangan/v_laporan_keuangan.php');
    }

    public function lihat_laporan()
    {
        $laporan_keuangan = $this->M_Keuangan->menampilkan_laporan()->result_array();

        for ($i = 0; $i < count($laporan_keuangan); $i++) {
            $laporan_keuangan[$i]['tanggal_perubahan'] = tanggal_indonesia($laporan_keuangan[$i]['tanggal_perubahan']);
            $laporan_keuangan[$i]['saldo_awal'] = mata_uang_indo($laporan_keuangan[$i]['saldo_awal']);
            $laporan_keuangan[$i]['uang_masuk'] = mata_uang_indo($laporan_keuangan[$i]['uang_masuk']);
            $laporan_keuangan[$i]['saldo_akhir'] = mata_uang_indo($laporan_keuangan[$i]['saldo_akhir']);
        }

        echo json_encode($laporan_keuangan);
    }
}
