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
            $peminjaman[$i]['jam_mulai'] = waktu($peminjaman[$i]['jam_mulai']);
            $peminjaman[$i]['jam_selesai'] = waktu($peminjaman[$i]['jam_selesai']);
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
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nohp = $this->input->post('nohp');
        $keperluan = $this->input->post('keperluan');
        $tanggal_booking = $this->input->post('tanggal_booking');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');

        $peminjaman = $this->db->query("SELECT tanggal_booking, jam_mulai, jam_selesai FROM peminjaman_ruangan WHERE id_ruangan = '$id_ruangan'")->result_array();

        for ($i = 0; $i < count($peminjaman); $i++) {
            $temp_jam_mulai_db = strtotime($peminjaman[$i]['jam_mulai']);
            $temp_jam_selesai_db = strtotime($peminjaman[$i]['jam_selesai']);
            if (strtotime($peminjaman[$i]['tanggal_booking']) == strtotime($tanggal_booking)) {

                if ($temp_jam_mulai_db >= strtotime($jam_mulai) && $temp_jam_selesai_db <= strtotime($jam_selesai) || $temp_jam_mulai_db <= strtotime($jam_mulai) && $temp_jam_selesai_db <= strtotime($jam_selesai) && $temp_jam_selesai_db >= strtotime($jam_mulai) || $temp_jam_mulai_db >= strtotime($jam_mulai) && $temp_jam_selesai_db >= strtotime($jam_selesai) && $temp_jam_mulai_db <= strtotime($jam_selesai)  || $temp_jam_mulai_db <= strtotime($jam_mulai) && $temp_jam_selesai_db >= strtotime($jam_selesai)) {
                    $this->session->set_flashdata('gagal', 'Tidak berhasil booking');
                    redirect('booking/' . $id_ruangan);
                }
            }
        }

        $data = array(
            'id_ruangan' => $id_ruangan, 'nama_peminjam' => $nama, 'email_peminjam' => $email, 'nohp_peminjam' => $nohp, 'keperluan' => $keperluan,
            'tanggal_booking' => $tanggal_booking, 'jam_mulai' => $jam_mulai, 'jam_selesai' => $jam_selesai, 'status_peminjaman' => 'PEMINJAMAN', 'is_notif' => 0, 'is_deleted' => 0
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
