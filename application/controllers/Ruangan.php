<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Ruangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Ruangan'));
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['ruangan'] = $this->M_Ruangan->tampil_ruangan_aktif()->result();
        $this->load->view('ruangan/v_peminjaman_ruangan.php', $data);
    }

    public function list_ruangan()
    {
        if ($this->session->userdata('status_jemaat') != "login") {
            redirect('login/jemaat');
        } else {
            $this->load->view('ruangan/v_list_ruangan.php');
        }
    }

    public function tampil_ruangan()
    {
        $ruangan = $this->M_Ruangan->tampil_ruangan_aktif()->result();
        echo json_encode($ruangan);
    }

    public function booking($id_ruangan)
    {
        if ($this->session->userdata('status_jemaat') != "login") {
            redirect('login/jemaat');
        } else {
            $data['ruangan'] = $this->M_Ruangan->pilih_ruangan($id_ruangan)->row_array();
            $data['id_ruangan'] = $id_ruangan;
            $this->load->view('ruangan/v_booking_ruangan.php', $data);
        }
    }

    public function proses_booking_ruangan()
    {
        if ($this->session->userdata('status_jemaat') != "login") {
            redirect('login/jemaat');
        } else {
            $id_ruangan = $this->input->post('id_ruangan');
            $id_anggota = $this->input->Post('id_anggota');
            $keperluan = $this->input->post('keperluan');
            $tanggal_booking = $this->input->post('tanggal_booking');
            $jam_mulai = $this->input->post('jam_mulai');
            $jam_selesai = $this->input->post('jam_selesai');

            $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
            $this->form_validation->set_rules('tanggal_booking', 'Tanggal', 'required');
            $this->form_validation->set_rules('jam_mulai', 'Jam mulai', 'required');
            $this->form_validation->set_rules('jam_selesai', 'Jam selesai', 'required');

            $this->form_validation->set_message('required', '{field} wajib diisi');

            if ($this->form_validation->run() == FALSE) {
                $respon = array(
                    'sukses' => false,
                    'error_keperluan' => form_error('keperluan'),
                    'error_tanggal' => form_error('tanggal_booking'),
                    'error_jam_mulai' => form_error('jam_mulai'),
                    'error_jam_selesai' => form_error('jam_selesai'),
                );
                echo json_encode($respon);
            } else {

                $uploadOk = 1;
                $peminjaman = $this->db->query("SELECT tanggal_booking, jam_mulai, jam_selesai FROM peminjaman_ruangan WHERE id_ruangan = '$id_ruangan'")->result_array();

                for ($i = 0; $i < count($peminjaman); $i++) {
                    $temp_jam_mulai_db = strtotime($peminjaman[$i]['jam_mulai']);
                    $temp_jam_selesai_db = strtotime($peminjaman[$i]['jam_selesai']);
                    if (strtotime($peminjaman[$i]['tanggal_booking']) == strtotime($tanggal_booking)) {

                        if ($temp_jam_mulai_db >= strtotime($jam_mulai) && $temp_jam_selesai_db <= strtotime($jam_selesai) || $temp_jam_mulai_db <= strtotime($jam_mulai) && $temp_jam_selesai_db <= strtotime($jam_selesai) && $temp_jam_selesai_db >= strtotime($jam_mulai) || $temp_jam_mulai_db >= strtotime($jam_mulai) && $temp_jam_selesai_db >= strtotime($jam_selesai) && $temp_jam_mulai_db <= strtotime($jam_selesai)  || $temp_jam_mulai_db <= strtotime($jam_mulai) && $temp_jam_selesai_db >= strtotime($jam_selesai)) {
                            $uploadOk = 0;
                            $respon['sukses'] = false;
                            $respon['error_booking'] = "Tidak berhasil booking karena ruang sudah terjadwal";
                            echo json_encode($respon);
                            break;
                        } else {
                            $uploadOk = 1;
                        }
                    } else {
                        $uploadOk = 1;
                    }
                }

                if ($uploadOk == 1) {
                    $tanggal = date('Y-m-d H:i:s');
                    $data = array(
                        'id_ruangan' => $id_ruangan, 'id_anggota' => $id_anggota, 'keperluan' => $keperluan,
                        'tanggal_booking' => $tanggal_booking, 'jam_mulai' => $jam_mulai, 'jam_selesai' => $jam_selesai, 'status_peminjaman' => 'SEDANG DIPROSES', 'created_at' => $tanggal
                    );
                    $this->M_Ruangan->insert_record($data, 'peminjaman_ruangan');
                    $respon['sukses'] = "Berhasil booking";
                    echo json_encode($respon);
                }
            }
        }
    }

    public function informasi_tanggal_booking($id_ruangan)
    {
        $peminjaman = $this->M_Ruangan->informasi_detail_peminjaman($id_ruangan)->result_array();
        for ($i = 0; $i < count($peminjaman); $i++) {
            $peminjaman[$i]['tanggal_booking'] = tanggal_indonesia($peminjaman[$i]['tanggal_booking']);
            $peminjaman[$i]['jam'] = waktu($peminjaman[$i]['jam_mulai']) . ' - ' .  waktu($peminjaman[$i]['jam_selesai']);
        }
        echo json_encode($peminjaman);
    }

    public function list_peminjaman()
    {
        if ($this->session->userdata('status_jemaat') != "login") {
            redirect('login/jemaat');
        } else {
            $this->load->view('ruangan/v_list_peminjaman');
        }
    }

    public function tampil_peminjaman($id_anggota)
    {
        $jemaat_peminjaman = $this->M_Ruangan->detail_peminjaman_oleh_jemaat($id_anggota)->result_array();
        for ($i = 0; $i < count($jemaat_peminjaman); $i++) {
            $jemaat_peminjaman[$i]['tanggal_booking'] = tanggal_indonesia($jemaat_peminjaman[$i]['tanggal_booking']);
            $jemaat_peminjaman[$i]['jam'] = waktu($jemaat_peminjaman[$i]['jam_mulai']) . ' - ' . waktu($jemaat_peminjaman[$i]['jam_selesai']);
        }
        echo json_encode($jemaat_peminjaman);
    }
}
