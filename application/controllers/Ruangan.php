<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Ruangan'));
        $this->load->helper('url', 'form');
    }

    public function index()
    {
        $data['ruangan'] = $this->M_Ruangan->tampil()->result();
        $this->load->view('ruangan/v_peminjaman_ruangan.php', $data);
    }

    public function informasi_tanggal_booking($id_ruangan)
    {
        $peminjaman = $this->M_Ruangan->informasi_detail_peminjaman($id_ruangan)->result_array();
        for ($i = 0; $i < count($peminjaman); $i++) {
            $peminjaman[$i]['tanggal_booking'] = tanggal_indonesia($peminjaman[$i]['tanggal_booking']);
        }
        echo json_encode($peminjaman);
    }

    public function booking_ruangan($id_ruangan)
    {
        $data['ruangan'] = $this->M_Ruangan->pilih_ruangan($id_ruangan)->row_array();
        $data['id_ruangan'] = $id_ruangan;
        $this->load->view('ruangan/v_proses_booking.php', $data);
    }

    public function proses_booking()
    {
        $id_ruangan = $this->input->post('id_ruangan');
        $no_anggota = $this->input->post('no_anggota');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nohp = $this->input->post('nohp');
        $keperluan = $this->input->post('keperluan');
        $tanggal_booking = $this->input->post('tanggal_booking');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');

        if ($no_anggota == NULL) {
            $no_anggota = NULL;
        } else {
            $no_anggota = $no_anggota;
        }

        $data = array(
            'id_ruangan' => $id_ruangan, 'no_anggota' => $no_anggota, 'nama_peminjam' => $nama, 'email_peminjam' => $email, 'nohp_peminjam' => $nohp, 'keperluan' => $keperluan,
            'tanggal_booking' => $tanggal_booking, 'jam_mulai' => $jam_mulai, 'jam_selesai' => $jam_selesai, 'status_peminjaman' => 'SEDANG DIPROSES'
        );
        $this->M_Ruangan->insert_record($data, 'peminjaman_ruangan');
        $this->session->set_flashdata('sukses', 'Berhasil booking');
        redirect('booking/' . $id_ruangan);
    }

    public function coba()
    {
        $data['ruangan'] = $this->db->query("SELECT * FROM coba_ruangan")->result_array();
        $data['detail'] = $this->db->query("SELECT * FROM detail_coba_ruangan")->result_array();

        $this->load->view('v_peminjaman_ruangan.php', $data);
    }
}
