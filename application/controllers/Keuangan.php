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

    public function tampil_pemasukan()
    {
        $pemasukan = $this->M_Keuangan->menampilkan_pemasukan()->result_array();

        for ($i = 0; $i < count($pemasukan); $i++) {
            $pemasukan[$i]['uang_masuk'] = mata_uang_indo($pemasukan[$i]['uang_masuk']);
            $pemasukan[$i]['tanggal_terima'] = tanggal_indonesia($pemasukan[$i]['tanggal_terima']);
        }
        echo json_encode($pemasukan);
    }

    public function pencatatan()
    {
        $kegiatan = $this->input->post('kegiatan');
        $uang_masuk = $this->input->post('uang_masuk');
        $tanggal_masuk = $this->input->post('tanggal_masuk');
        $keterangan = $this->input->post('keterangan');

        $laporan = $this->M_Keuangan->saldo_akhir()->row_array();

        if (isset($laporan['saldo']) == NULL) {
            $saldo = '0';
        } else {
            $saldo = $laporan['saldo'];
        }

        $saldo_tambah = $saldo + $uang_masuk;

        $tanggal = date('Y-m-d H:i:s');

        $data = array(
            'kegiatan' => $kegiatan, 'keterangan' => $keterangan, 'uang_masuk' => $uang_masuk, 'tanggal_terima' => $tanggal_masuk, 'tanggal_pencatatan' => $tanggal,
            'saldo_awal' => $saldo, 'saldo_akhir' => $saldo_tambah, 'is_debit' => '1'
        );

        $this->M_Keuangan->insert_record($data, 'keuangan');
        $this->session->set_flashdata('sukses', 'Berhasil dicatat');
        redirect('keuangan');
    }

    public function pengeluaran()
    {
        $data['title'] = "Keuangan";
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/keuangan/v_pengeluaran.php');
    }

    public function lihat_pengeluaran()
    {
        $pengeluaran = $this->M_Keuangan->menampilkan_pengeluaran()->result_array();

        for ($i = 0; $i < count($pengeluaran); $i++) {
            $pengeluaran[$i]['uang_keluar'] = mata_uang_indo($pengeluaran[$i]['uang_keluar']);
            $pengeluaran[$i]['tanggal_keluar'] = tanggal_indonesia($pengeluaran[$i]['tanggal_keluar']);
        }

        echo json_encode($pengeluaran);
    }

    public function pencatatan_pengeluaran()
    {
        $kegiatan = $this->input->post('kegiatan');
        $uang_keluar = $this->input->post('uang_keluar');
        $tanggal_keluar = $this->input->post('tanggal_keluar');
        $keterangan = $this->input->post('keterangan');

        $laporan = $this->M_Keuangan->saldo_akhir()->row_array();

        if (isset($laporan['saldo']) == NULL) {
            $saldo = '0';
        } else {
            $saldo = $laporan['saldo'];
        }

        $saldo_berkurang = $saldo - $uang_keluar;

        $tanggal = date('Y-m-d H:i:s');

        $data = array(
            'kegiatan' => $kegiatan, 'keterangan' => $keterangan, 'uang_keluar' => $uang_keluar, 'tanggal_keluar' => $tanggal_keluar, 'tanggal_pencatatan' => $tanggal,
            'saldo_awal' => $saldo, 'saldo_akhir' => $saldo_berkurang, 'is_kredit' => '1'
        );

        $this->M_Keuangan->insert_record($data, 'keuangan');
        $this->session->set_flashdata('sukses', 'Berhasil dicatat');
        redirect('keuangan/pengeluaran');
    }

    public function laporan()
    {
        $data['title'] = "Keuangan";
        $data['laporan'] = $this->M_Keuangan->menampilkan_laporan()->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/keuangan/v_laporan_keuangan.php', $data);
    }

    public function lihat_laporan()
    {
        $laporan_keuangan = $this->M_Keuangan->menampilkan_laporan()->result_array();

        for ($i = 0; $i < count($laporan_keuangan); $i++) {
            $laporan_keuangan[$i]['tanggal_pencatatan'] = tanggal_indonesia($laporan_keuangan[$i]['tanggal_pencatatan']);
            $laporan_keuangan[$i]['saldo_awal'] = mata_uang_indo($laporan_keuangan[$i]['saldo_awal']);
            $laporan_keuangan[$i]['uang_masuk'] = mata_uang_indo($laporan_keuangan[$i]['uang_masuk']);
            $laporan_keuangan[$i]['uang_keluar'] = mata_uang_indo($laporan_keuangan[$i]['uang_keluar']);
            $laporan_keuangan[$i]['saldo_akhir'] = mata_uang_indo($laporan_keuangan[$i]['saldo_akhir']);
        }

        echo json_encode($laporan_keuangan);
    }

    public function detail_pemasukan($id_keuangan)
    {
        $data['title'] = "Keuangan";
        $data['laporan'] = $this->M_Keuangan->lihat_detail_pemasukan($id_keuangan)->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/keuangan/');
    }
}
